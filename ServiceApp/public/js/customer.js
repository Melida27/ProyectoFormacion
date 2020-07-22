$(document).ready(function(){
	var btn_info = $('.btn-info-technical');
	var identification_technical = $('.identification_technical');
	var name_technical = $('.name_technical');
	var email_technical = $('.email_technical');
	var phone_technical = $('.phone_technical');
	var birthdate_technical = $('.birthdate_technical');
	var gender_technical = $('.gender_technical');
	var experience_technical = $('.experience_technical');
	var tbody_studies = $('.tbody_studies');
	var tbody_experiences = $('.tbody_experiences');

    btn_info.click(function(event) {
    	getInfoTechnical($(this).attr('data-id'));
    });


    function getInfoTechnical(idCurriculum) {
       $.get('/technical-info/'+idCurriculum, (response) => {
       	tbody_experiences.empty();
       	tbody_studies.empty();
       	console.log(response);
       	   identification_technical.text(response.technical_info.identification_user);
           name_technical.text(response.technical_info.first_name + ' ' + response.technical_info.second_name + ' ' + response.technical_info.first_lastname + ' ' + response.technical_info.second_lastname);
           email_technical.text(response.technical_info.email);
           phone_technical.text(response.technical_info.phone);
           birthdate_technical.text(response.technical_info.birthdate);
           gender_technical.text(response.technical_info.gender);
           experience_technical.text(response.curriculum.experience + " años");

           for (var i = 0;i < response.studies.length; i++) {
               let row = document.createElement('tr');

           	   let studyTd1 = document.createElement('td');
           	   studyTd1.innerHTML = response.studies[i].institution;

               let studyTd2 = document.createElement('td');
           	   studyTd2.innerHTML = response.studies[i].type;

           	   let studyTd3 = document.createElement('td');
           	   studyTd3.innerHTML = response.studies[i].title;

           	   let studyTd4 = document.createElement('td');
           	   studyTd4.innerHTML = response.studies[i].end_date;

               row.append(studyTd1);
               row.append(studyTd2);
               row.append(studyTd3);
               row.append(studyTd4);

               tbody_studies.append(row);
           }


           for (var i = 0;i < response.experiences.length; i++) {
               let row = document.createElement('tr');

           	   let experienceTd1 = document.createElement('td');
           	   experienceTd1.innerHTML = response.experiences[i].company_name;

               let experienceTd2 = document.createElement('td');
           	   experienceTd2.innerHTML = response.experiences[i].position;

           	   let experienceTd3 = document.createElement('td');
           	   experienceTd3.innerHTML = response.experiences[i].time_experience_company;

           	   let experienceTd4 = document.createElement('td');
           	   experienceTd4.innerHTML = response.experiences[i].description;

               row.append(experienceTd1);
               row.append(experienceTd2);
               row.append(experienceTd3);
               row.append(experienceTd4);

               tbody_experiences.append(row);
           }
       });
    }
});