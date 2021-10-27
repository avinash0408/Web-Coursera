function search() {

  var value = document.getElementById("input").value;
  pattern = RegExp(value, "i");

  console.log(value);
  console.log(courses);

  var final_courses = []

  if(value == "") {
    final_courses = courses
  }
  else {
    for(course of courses) {
      str = course['name'];
      res = pattern.exec(str)
  	
  		console.log(str, res);
      if(res)
        final_courses.push(course)
    }
  }
  console.log(final_courses);
  
  showCourses(final_courses)
}

function showCourses(courses){
  services = document.getElementById("services_wrapper");
  services.innerHTML = "";
  for(course in courses) {
    if(courses[course].enrolled == 1){
      services.insertAdjacentHTML("beforeend", `
      <div class = "services__card">
      <img src="/WebCoursera/images/${courses[course].name}.png" height="250px" width="275px"><br><a href = '/WebCoursera/php/course.php?course=${courses[course].name}'><button class="go_to_course_button" id="${courses[course].id}">Go to Course</button></a>
      </div>
    `)
    }
  }
  for(course in courses){
    if(courses[course].enrolled == 0){
        services.insertAdjacentHTML("beforeend", `
        <div class = "services__card">
        <img src="/WebCoursera/images/${courses[course].name}.png" height="250px" width="275px"><br><a href = '/WebCoursera/php/course.php?course=${courses[course].name}'><button class="enroll_button" id="${courses[course].id}">Enroll Course</button></a>
        </div>
      `)
    }
  }
}

search();
