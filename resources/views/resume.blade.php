@include('Layout.header')
<div class="container">
    <h1>Resumes</h1>
    @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
    <form method="POST" action="resume" id="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <span id="name_error" class="error"></span>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="form-control" id="dob" name="dob" required>
        </div>

        <div class="form-group">
          <label>Gender:</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
        <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
        <label class="form-check-label" for="female">Female</label>
        </div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required onkeyup="checkEmail();">
            <span id="email_error" class="error"></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
        <label for="experience">Experience:</label>
         <select class="form-control" id="experience" name="experience" required>
           <option value="">Select an option</option>
           <option value="less_than_1_year">Less than 1 year</option>
           <option value="1_to_2_years">1 to 2 years</option>
           <option value="2_to_5_years">2 to 5 years</option>
        </select>
        </div>
        <div class="form-group">
          <label for="education">Education:</label>
          <div class="form-check">
           <input type="radio" class="form-check-input" id="education1" name="education[]" value="Bachelor's Degree" required>
           <label class="form-check-label" for="education1">Bachelor's Degree</label>
        </div>
           <div class="form-check">
           <input type="radio" class="form-check-input" id="education2" name="education[]" value="Master's Degree" required>
        <label class="form-check-label" for="education2">Master's Degree</label>
        </div>
        </div>
        <div class="form-group">
         <label for="skills">Skills:</label>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" name="skills[]" value="HTML">
         <label class="form-check-label" for="html">HTML</label>
       </div>
       <div class="form-check">
        <input class="form-check-input" type="checkbox" name="skills[]" value="CSS">
        <label class="form-check-label" for="css">CSS</label>
       </div>
       <div class="form-check">
        <input class="form-check-input" type="checkbox" name="skills[]" value="JavaScript">
        <label class="form-check-label" for="javascript">JavaScript</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="skills[]" value="PHP">
        <label class="form-check-label" for="php">PHP</label>
      </div>
      </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>  
$(document).ready (function () 
{  
 $('#form').submit (function()
  {
          
    var name       = $('#name').val();
    var email        = $('#email').val();        
    var number      = $('#phonenumber').val();
    var city        = $('#city').val();     


    var flag = 1;

    //name validate

    var flag = 1;
    if(name.length < 1) {   
      $('#name_error').text('please enter name');
      flag = 0;
    }
    
       //email validate

     if (email.length < 1)
     {  
       $('#email_error').text('please enter Your email Id');
       flag = 0;
     }
     else 
     {  
       var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;  
       var validEmail = regEx.test(email);  
       if (validEmail) 
       {  
         $('#email').after('<span class="error">Enter a valid email</span>');  
         flag = 0;
       }  
     }
   
    //number validate

    if(number.length < 1) {  
      $('#number_error').text('please enter valid number'); 
      flag = 0;
    }

    //city validate

    if(city.length < 1){
      $('#city_error').text('please slect city'); 
      flag = 0;
    }
     //checkbox validate

     if($('input[type=checkbox]:checked').length == 0)
    {
      $('#hobbies_error').text('ERROR! Please select at least one checkbox');
      flag = 0;
    }
    
    if(flag == 1){
      return true;
    }else{
      return false;
    }    

  });  
   
});  

</script>
<script>
  function checkEmail(){
        
        var email       = $('#email').val();
$.ajax({
        
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ url('checkemail') }}",
        data : {'token' : email},
        type : 'GET',
        success : function(result){
          if(result == 1){
            $('#email_error').text('This Email Id Already Exist');
          }
          else{
                  $('#email_error').text('');
                }

        },
        error: function(){

       }
    });
  }
</script>
<style>
  .error{
    color:red;
  }
</style>

@include('Layout.footer')