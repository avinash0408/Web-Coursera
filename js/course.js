var prev_time_state = [], category = [];
var player, loaded_video_number;
console.log(links);
async function checkbox(input_class){
    console.log(input_class);
    console.log(input_class.id[8]);
    var checkbox_status = document.getElementById(input_class.id).checked;
    console.log(checkbox_status);
    var bool = 0;
    if(checkbox_status == true){
        bool = 1;
    }
    console.log(parseInt(input_class.id[8]));
    console.log(link_id[parseInt(input_class.id[8])]);
    document.cookie = `checkbox=${bool};`;
    document.cookie =  `clicked_video=${link_id[parseInt(input_class.id[8])]};`;
    var res = await fetch('http://localhost/WebCoursera/php/checkbox_update.php').then(function (response) {
            return response.text();
        }).then(function (html) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(html, 'text/html');
            console.log(doc);
            console.log(parser);

        }).catch(function (err) {
            // There was an error
            console.warn('Something went wrong.', err);
        });;
    console.log(document.cookie);
    const myArray = document.cookie.split('; ');
    console.log(myArray);
    for(var i=0;i<myArray.length;i++){
        var cookie = myArray[i].split('=');
        console.log(cookie);
        console.log(cookie[0].localeCompare('checkbox'));
        console.log(cookie[1].localeCompare('-1'))
        if(cookie[0].localeCompare('checkbox') == 0 && cookie[1].localeCompare('-1') == 0){
            window.location.replace("http://localhost/WebCoursera/index.php");
        }
    }
}
function re_render(){
    console.log('Entered to re_render()')
    var table = document.getElementById("cat-table");
    
    table.innerHTML = "";
    
    for(var i = 0; i < links.length-1; i++){
        var row = table.insertRow(i);
        row.id = "row"+i;
        
        var c1 = row.insertCell(0);
        c1.className = "vid-frame";
        c1.id = "video"+i.toString();
        
        var c2 = row.insertCell(1);
        c2.className = "vid-content";
        c2.innerHTML = `
        <div class='content-div'> 
            <div class="line-row"><h2 id = ${"title" + i}></h2><form action="/WebCoursera/php/db_update.php" type="submit"><input class="check" id = ${"checkbox" + i} value = ${i} type="checkbox" onclick=checkbox(this)>  </div>
            <h3 class="duration" id=${"duration"+i}> </h3>
            <p id=${"description"+i}>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            </p>              
        </div>`;    
        console.log('This is the checkbox status of '+i+' '+checkbox_status[i])
        if(checkbox_status[i] == '1' || checkbox_status[i] == 1){
            document.getElementById("checkbox" + i).checked = true;
        }
    }
}
function render(){
    var e = document.getElementById("category");
    var cur_cat = e.value;
    if(cur_cat != 'all'){
        for(var i=0;i<links.length-1;i++){
            if(category[i] != cur_cat){
                document.getElementById("row"+i).style.display = "none";
            }
            else{
                document.getElementById("row"+i).style.display = "inherit";
            }
        }
    }
    else{
        for(var i=0;i<links.length-1;i++){
            document.getElementById("row"+i).style.display = "inherit";
        }
    }
}

for(var i = 0; i < links.length; i++){
    prev_time_state.push(0);
    category.push('NULL');
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function convertHMS(sec) {
    let hours   = Math.floor(sec / 3600); 
    let minutes = Math.floor((sec - (hours * 3600)) / 60); 
    let seconds = sec - (hours * 3600) - (minutes * 60);
    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds; // Return is HH : MM : SS
}
async function onYouTubeIframeAPIReady() {
    for(loaded_video_number = 0; loaded_video_number<links.length; loaded_video_number++){
        player = new YT.Player("video"+(loaded_video_number-1).toString(), {
            height: '160',
            width: '320',
            videoId: links[loaded_video_number],
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
        await sleep(2000);
    }
}
function onPlayerReady(event) {
    var title = player.playerInfo.videoData.title;
    var duration = player.playerInfo.duration;
    var video_id = player.playerInfo.videoData.video_id,video_idx;
    document.getElementById('title'+(loaded_video_number-1).toString()).innerHTML = title;
    document.getElementById('duration'+(loaded_video_number-1).toString()).innerHTML = convertHMS(duration);
    for(var i=0;i<links.length;i++){
        if(video_id == links[i]){
            video_idx = i-1;
        }
    }
    if(duration < 3600){
        category[video_idx] = "short";
    }
    else if(duration < 10800){
        category[video_idx] = "medium";
    }
    else{
        category[video_idx] = "long";
    }
    console.log('Video '+player.playerInfo.videoData.video_id+' is loaded');
}

async function onPlayerStateChange(event) {

    if (event.data == YT.PlayerState.PLAYING) {
        var curr_video_id = event.target.playerInfo.videoData.video_id;
        console.log('video '+curr_video_id+' started');
        var curr_video_idx = -1;
        var today = new Date();
        var date = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        for(var i=0;i<links.length;i++){
            if(curr_video_id == links[i]){
                curr_video_idx = i;
            }
        }
        prev_time_state[curr_video_idx] = date+' '+time;
    }

    else if(event.data == YT.PlayerState.PAUSED){
        var curr_video_id = event.target.playerInfo.videoData.video_id;
        console.log('video '+curr_video_id+' paused');
        var curr_video_idx = -1;
        var today = new Date();
        console.log(today)
        var date = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var datetime = date + ' ' + time
        for(var i=0;i<links.length;i++){
            if(curr_video_id == links[i]){
                curr_video_idx = i;
            }
        }
        console.log('You started playing this video' + curr_video_id + ' from '+prev_time_state[curr_video_idx]+' to ' + datetime);
        var diff = new Date(datetime) - new Date(prev_time_state[curr_video_idx]);
        diff = diff/1000;
        console.log('Time Difference is '+diff);
        console.log('Previous Distance covered is '+duration_covered[curr_video_idx-1]);
        console.log('Current video index is '+curr_video_idx);
        duration_covered[curr_video_idx-1] = parseInt(duration_covered[curr_video_idx-1]) + diff;
        console.log('You covered ' + duration_covered[curr_video_idx-1] +' seconds of the video '+curr_video_id);

        document.cookie = `duration=${duration_covered[curr_video_idx-1]}`;
        document.cookie =  `clicked_video=${link_id[curr_video_idx-1]};`;
        var res = await fetch('http://localhost/WebCoursera/php/duration_update.php').then(function (response) {
                return response.text();
            }).then(function (html) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(html, 'text/html');
                console.log(doc);
                console.log(parser);

            }).catch(function (err) {
                // There was an error
                console.warn('Something went wrong.', err);
            });;
        console.log(document.cookie);
        const myArray = document.cookie.split('; ');
        console.log(myArray);
        for(var i=0;i<myArray.length;i++){
            var cookie = myArray[i].split('=');
            console.log(cookie);
            console.log(cookie[0].localeCompare('checkbox'));
            console.log(cookie[1].localeCompare('-1'))
            if(cookie[0].localeCompare('checkbox') == 0 && cookie[1].localeCompare('-1') == 0){
                console.log('Ticked the element checkbox'+curr_video_idx-1);
                document.getElementById("checkbox"+(curr_video_idx-1)).checked = true;
            }
        }
    }
}