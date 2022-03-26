
$(document).ready(function () {
  var year = (new Date).getFullYear();
  $('.only-year').datepicker({
    format: 'yyyy',
    changeMonth: true, 
    changeYear: true,
    yearRange: "1900:9999"
  });
});