<!doctype html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="robots" content="noindex,nofollow">
   <title>Swajan - Bankers Community</title>
   <meta name="description" content="Swajan Bankers Community">
   <link rel="icon" href="{{asset('landing/assets/images/favicon.png')}}" sizes="32x32" />
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="{{asset('landing/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
<div class="preloader" id="preloader">
   <div id="loader"></div>
</div>
<div class="content-wrap">
   <div class="logo-box">
      <img src="{{asset('landing/assets/images/logo.svg')}}">
   </div>
   <div class="cta-box">
      <h1>Launching <span class="highlight">Soon...</span></h1>
      <p>We are revamping our website to enhance your experience! Please leave your email, and we'll notify you as soon as we're back up and running. Thank you for your patience and support!
      </p>
   </div>

   <form id="newsletterForm" class="newsletter" name="newsletter"  method="POST" autocomplete="off">
    @csrf
        <input type="email" id="email" class="form-field" name="email" placeholder="Your Email" required>
        <button type="submit" class="btn-main">Notify me!</button>
    </form>

</div>
<a href="https://wa.me/919601257566/"><img src="{{asset('landing/assets/images/whatsapp.svg')}}" alt="" srcset="" class="whatsapp">
</a>
<script src="{{asset('landing/assets/js/main.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('newsletterForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const token = document.querySelector('input[name="_token"]').value;

            fetch('{{ url('/subscribe') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    email: email
                })
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw response;
                }
            })
            .then(data => {
                alert('Email sent successfully');
                form.reset();
            })
            .catch(response => {
                if (response.status === 400) {
                    alert('Invalid email address');
                } else {
                    alert('Failed to send email');
                }
            });
        });
    });
</script>

</body>
</html>