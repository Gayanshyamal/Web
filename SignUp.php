
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="HC.css">
    <link rel="stylesheet" href="SingUp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> <!--use calender design change-->
    <link rel="shortcut icon" type="x-icon" href="Picsart_25-07-09_11-29-44-084.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
      .Sreset
      {
         width: 80px; 
         padding: 5px 0; 
         margin: 10px; 
         position: relative;
         left: 148px;
         background: transparent; 
         backdrop-filter: blur(10px); 
         border: 2px solid #fff; 
         border-radius: 6px; 
         color: white; 
         font-size: 15px; 
         cursor: pointer;
      }

      .Sreset:hover
      {
         background: white;
         color: #162938;
      }

    </style>
</head>
<body>
    <div class="BGimage">
        <nav class="navbar">
         <div class="navbar-container">
            <div><img src="Picsart_25-07-09_11-29-44-084.png" class="Logo"></div>
            <a href="index.html" class="navbar-logo">Student Web Portal</a>
            <button class="navbar-toggle">
               <span class="bar"></span>
               <span class="bar"></span>
               <span class="bar"></span>
            </button>
            <ul class="navbar-menu">
               <li><a href="index.html">Home</a></li>
               <li><a href="Aboutus.html">About us</a></li>
               <li><a href="Contact.html">Contact</a></li>
               <li>
                  <button class="btnLogin-popup" >Login</button>
               </li>
            </ul>
          </div>
         </nav>
         <div class="wrapper">
            <span class="icon-close">
               <ion-icon name="close"></ion-icon>
            </span>
            <div class="form-box login">
               <h2>Login</h2>
               <form action="register.php" method="POST" id="login-form"> 
                  <div class="input-box">
                     <span class="icon"><ion-icon name="mail"></ion-icon></span>
                     <input  type="email" id="login-email" name="Login-email" required>
                     <label>Email</label>
                  </div>
                  <div class="input-box">
                     <img src="eye-close.png" id="eyeicon">
                     <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                     <input type="password"  id="login-password" name="Login-password" required>
                     <label>Password</label>
                     
                  </div>
                  <div class="remember-forget">
                     <label><input type="checkbox">Remember me</label>
                     <a href="#">Forgot Password?</a>
                  </div>
                  <button type="submit" class="btn" name="Login">Login</button>
                  <button type="reset" class="Sreset">Reset</button>
                  <div class="login-register">
                     <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
                  </div>
               </form>
            </div>
            
            <div class="form-box Register">
               <h2>Registration</h2>
               <form action="register.php" method="POST" id="register-form">
                  <div class="input-box">
                     <span class="icon">
                        <ion-icon name="person"></ion-icon>
                     </span>
                     <input type="Text" id="reg-firstname" name="Reg-firstname" required>
                     <label>First name</label>
                  </div>
                  <div class="input-box">
                     <span class="icon">
                        <ion-icon name="person"></ion-icon>
                     </span>
                     <input type="Text" id="reg-lastname" name="Reg-lastname" required>
                     <label>Last name</label>
                  </div>

                  <div class="BD">
                     <input type="date" id="birthday" name="Birthday" required>
                     <label for="birthday">Birthday</label>
                  </div>

                  <div class="input-box">
                     <span class="icon"><ion-icon name="mail"></ion-icon></span>
                     <input type="email" id="reg-email" name="Reg-email" required>
                     <label>Email</label>
                  </div>
                  <div class="input-box">
                     <img src="eye-close.png" id="Reyeicon">
                     <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                     <input type="password" id="regPassword" name="RegPassword" required>
                     <label>Password</label>
                  </div>
                  <div class="remember-forget">
                     <label for="RegTerms"><input type="checkbox" id="RegTerms" name="regTerm">I agree to the terms & conditions</label>
                  </div>
                  <button type="submit" class="btn" name="Register">Register</button>
                  <button type="reset" class="Sreset">Reset</button>
                  <div class="login-register">
                     <p>Already have an account?<a href="#" class="login-link"> Login</a></p>
                  </div>
               </form>
            </div>
         </div>
      </div>
    <script src="Hscript.js" defer></script>
    <script src="ValidationLR.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
   
   // Lodin page password hiden funtion

   let eyeicon = document.getElementById("eyeicon");
   let PS = document.getElementById("login-password");

   eyeicon.onclick = function()
   {
    if(PS.type == "password")
      {
         PS.type = "text";
         eyeicon.src = "eye-open.png";

      }
    else
      {
         PS.type = "password";
         eyeicon.src = "eye-close.png";
      }
   }

   // Registration page password hiden funtion

   let Reyeicon = document.getElementById("Reyeicon");
   let PSR = document.getElementById("regPassword");
   Reyeicon.onclick = function()
   {
    if(PSR.type == "password")
      {
         PSR.type = "text";
         Reyeicon.src = "eye-open.png";

      }
    else
      {
         PSR.type = "password";
         Reyeicon.src = "eye-close.png";
      }
   }


</script>
</body>
</html>