<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up Form</title>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <!-- EYE ICON -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <!-- Custom CSS File -->
    <link rel="stylesheet" href="../HomePage/signup_style.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  </head>

  <body>
    <section class="container">
      <header>Sign Up</header>
      <form action="../HomePage/signup_connection.php" method="POST" class="form">
        <!-- COLUMN 1 : FIRST NAME + MIDDLE NAME -->
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input type="text" name="firstName" placeholder="Enter your first name" required />
          </div>
          <div class="input-box">
            <label>Middle Initial</label>
            <input type="text" name="middleInitial" placeholder="Enter your middle initial" required />
          </div>
        </div>

        <!-- COLUMN 2 : SURNAME + SUFFIX -->
        <div class="column">
          <div class="input-box">
            <label>Surname</label>
            <input type="text" name="surname" placeholder="Enter your surname" required />
          </div>
          <div class="input-box">
            <label>Suffix</label>
            <input type="text" name="nameSuffix" placeholder="Sr, Jr, PhD, N/A, etc." />
          </div>
        </div>

        <!-- COLUMN 3 : PHONE NUMBER + BIRTH DATE -->
        <div class="column">
          <div class="input-box type-phone-number">
            <label>Contact Number</label>
            <div class="input-field">
              <input type="number" class="phone-number" name="contactNumber" placeholder="09*********" required />
            </div>
            <span class="error email-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter 11 digits</p>
            </span>   
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="birthDate" placeholder="Enter your birth date" required />
          </div>
        </div>

        <!-- COLUMN 4 : EMAIL -->
        <div class="column">
          <div class="input-box type-email">
            <label>Email</label>
            <div class="input-field">
              <input type="email" class="email" name="email" placeholder="your@email.com" required />
            </div>
            <span class="error email-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter a valid email</p>
            </span>
          </div>
        </div>
        
        <!-- COLUMN 5 : BRANCH LOCATION + WORKING HOURS + USER TYPE -->
        <div class="column">
          <div class="input-box">
            <label>Branch Location</label>
            <div class="select-box">
              <select name="branchLocation">
                <option hidden>Select branch</option>
                <option value="Palao">Palao</option>
                <option value="Tambacan">Tambacan</option>
                <option value="Tubod">Tubod</option>
                <option value="Suarez">Suarez</option>
                <option value="Buru-un">Buru-un</option>
                <option value="Fuentes">Fuentes</option>
              </select>
            </div>
          </div>
          <div class="input-box">
            <label>Working Hours</label>
            <input type="number" name="workingHours" placeholder="Enter your working hours" required />
          </div>
          <div class="user-type-box">
            <h3>User Type</h3>
            <div class="user-type-option">
              <div class="user-type">
                <input type="radio" id="check-admin" name="userType" value="admin"/>
                <label for="check-admin">Admin</label>
              </div>
              <div class="user-type">
                <input type="radio" id="check-clerk" name="userType" value="clerk"/>
                <label for="check-clerk">Clerk</label>
              </div>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="input-box create-password">
            <label>Password</label>
            <div class="input-field">
              <input type="password" id="password" class="password" name="password" placeholder="Enter your password" required />
              <i class="bx bx-hide show-hide"></i>
            </div>
            <span class="error password-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">
                Please enter at least 8 characters with a number, a symbol, a small letter, and a
                capital letter.
              </p>
            </span>
          </div>
          <div class="input-box confirm-password">
            <label>Confirm Password</label>
            <div class="input-field">
              <input type="password" id="confirmPassword" class="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required />
              <i class="bx bx-hide show-hide"></i>
            </div>
            <span class="error cPassword-error" id="password_match_error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Passwords don't match</p>
            </span>
          </div>
        </div>

        <button type="submit" name="insert">Submit</button>
      </form>
    </section>
    
    <script src="../HomePage/signup_script.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="js/script.js"></script>
    
    <script>
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confirmPassword');
      const passwordMatchError = document.getElementById('password_match_error');
      const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      
      confirmPasswordInput.addEventListener('input', () => {
        if (confirmPasswordInput.value !== passwordInput.value) {
          passwordMatchError.textContent = "Passwords don't match";
        } else if (!passwordPattern.test(passwordInput.value)) {
          passwordMatchError.textContent = 'Please enter at least eight characters, one letter, one number, and one special character';
        } else {
          passwordMatchError.textContent = '';
        }
      });
    </script>
  </body>
</html>
