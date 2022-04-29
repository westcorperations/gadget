$(document).ready(function () {
    $('.paystackbtn').click(function (e) {
        e.preventDefault();

var firstname = $('.firstname').val();
var lastname= $('.lastname').val();
var email = $('.email').val();
var phone = $('.phone').val();
var address1 = $('.address1').val();
var address2 = $('.address2').val();
var city = $('.city').val();
var state = $('.state').val();
var country = $('.country').val();
var pincode = $('.pincode').val();

        if(!firstname){
            firstname_error = "First Name Is Required!";
            $('#firstname_error').html('');
            $('#firstname_error').html(firstname_error);
        }else{
            firstname_error = "" ;
            $('#firstname_error').html('');
        }
        if(!lastname){
            lastname_error = "Last Name Is Required!";
            $('#lastname_error').html('');
            $('#lastname_error').html(lastname_error);
        }else{
            lastname_error = "" ;
            $('#lastname_error').html('');
        }

        if(!email){
            email_error = "Email Is Required!";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }else{
            email_error = "";
            $('#email_error').html('');
        }
        if(!phone){
            phone_error = "phone Is Required!";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }else{
            phone_error = "";
            $('#phone_error').html('');
        }
        if(!address1){
            address1_error = "Address Is Required!";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }else{
            address1_error = "";
            $('#address1_error').html('');
        }
        if(!address2){
            address2_error = "Address Is Required!";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }else{
            address2_error = "";
            $('#address2_error').html('');
        }
        if(!city){
            city_error = "City Is Required!";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }else{
            city_error = "";
            $('#city_error').html('');
        }
        if(!state){
            state_error = "State Is Required!";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }else{
            state_error = "";
            $('#state_error').html('');
        }
        if(!country){
            country_error = "Country Is Required!";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }else{
            country_error = "";
            $('#country_error').html('');
        }
        if(!pincode){
            zipcode_error = "Zipcode Is Required!";
            $('#zipcode_error').html('');
            $('#zipcode_error').html(zipcode_error);
        }else{
            zipcode_error = "";
            $('#zipcode_error').html('');
        }

if ( firstname_error != ''|| lastname_error!= ''|| email_error != ''|| phone_error != ''|| address1_error != ''|| address2_error != ''|| state_error != ''|| city_error != ''|| country_error != ''|| zipcode_error != '')
{
    return false;
} else {
var data = {
    'firstname':firstname,
    'lastname':lastname,
    'email':email,
    'phone':phone,
    'address1':address1,
    'address2':address2,
    'city':city,
    'state':state,
    'country':country,
    'pincode':pincode,
}
$.ajax({
    type: "POST",
    url: "/proceed-to-pay",
    data: data,
    success: function (response) {
// swal(response.total_price);
// const paymentForm = document.getElementById('paymentForm');
// paymentForm.addEventListener("submit", payWithPaystack, false);
// function payWithPaystack(e) {
//   e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_5800cef4612ad224ecd103bd192d24e9aee87634', // Replace with your public key
    email: response.email ,
    amount: response.total_price * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      swal('Window closed.');
    },
    callback: function(responsea){
        // let message = 'Payment complete! Reference: ' + responsea.reference;
        // swal(message);
      $.ajax({
          type: "POST",
          url: "/place-order",
          data: {
              'firstname': response.firstname,
              'lastname': response.lastname,
              'email': response.email,
              'phone': response.phone,
              'address1': response.address1,
              'address2': response.address2,
              'city': response.city,
              'state': response.state,
              'country': response.country,
              'pincode': response.pincode,
              'payment_mode': "paid with paystack",
              'payment_id': responsea.reference,

          },

        //   dataType: "dataType",
          success: function (responseb) {
swal(responseb.status);
window.location.href= '/user-dashboard';
          }
      });
    }
  });
  handler.openIframe();

    }
});
}

    });
});
