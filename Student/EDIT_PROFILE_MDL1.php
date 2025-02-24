<!DOCTYPE html>
<html lang="en">
<?php


// Retrieve the data from the database
$userdataret = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM student WHERE Username = :studentUsername");
$stmt->bindParam(':studentUsername', $userdataret); // Replace $studentId with the actual student ID
$stmt->execute();
$studentData = $stmt->fetch(PDO::FETCH_ASSOC);

// Assign the retrieved data to variables
$lastName = $studentData['Lastname'];
$firstName = $studentData['Firstname'];
$middleName = $studentData['Middlename'];
$suffix = $studentData['Suffix'];
$birthdate = $studentData['Birthdate'];
$civilStatus = $studentData['Civilstatus'];
$contactNumber = $studentData['Contactnumber'];
$sex = $studentData['Sex'];
$completeAddress = $studentData['Address'];
$city = $studentData['City'];
$zipCode = $studentData['ZipCode'];
$citizenship = $studentData['Citizenship'];
$emailAddress = $studentData['EmailAddress'];
$password = $studentData['Password'];
$username = $studentData['Username'];
$enrollStatus = $studentData['Enroll_Status'];
$role = $studentData['Role'];
$profilePicture = $studentData['picture'];
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>BTS Driving school</title>
	<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
</head>
<style>
    #message p {
  font-size: 16px;
  position: relative;
}

#message span {
  display: none;
  position: absolute;
  right: -20px;
}

#message span#check-icon {
  color: green;
}

#message span#x-icon {
  color: red;
}
.input-error {
  box-shadow: 0 0 5px red;
}
</style>
<body>
	<div id="EditProf" class="modal_SignUp">
		<!-- Modal content -->
		<div class="modal-content_Signup">
			<div class="modal-header_SignUp">
				<span class="close_SignUp">&times;</span>
				<h1>Sign Up</h1>
				<br>
			</div>
			<div class="modal-body_SignUp">
				<div class="container">
                <form id="SignUp_Student" method="post" enctype="multipart/form-data">
                        <div class="Personal Data">
                            <span class="Title">
                                <p class="headers">Personal Data</p>
                            </span>
                            <div class="fields">
                                <div class="input-fields">
                                    <div class="first_row_input">
                                        <input type="text" name="LastName" placeholder="&nbsp Last Name"
                                            pattern="[A-Za-z ]+" title="Should only contain letters"
                                            oninput="this.value = capitalizeWords(this.value.slice(0, 25))"
                                            maxlength="25" value="<?php echo $lastName; ?>">
                                        <input type="text" name="FirstName" placeholder="&nbsp First Name"
                                            pattern="[A-Za-z ]+" title="Should only contain letters"
                                            oninput="this.value = capitalizeWords(this.value.slice(0, 25))"
                                            maxlength="25" value="<?php echo $firstName; ?>">
                                        <input type="text" name="MiddleName" placeholder="&nbsp Middle Name"
                                            pattern="[A-Za-z ]+" title="Should only contain letters"
                                            oninput="this.value = capitalizeWords(this.value.slice(0, 25))"
                                            maxlength="25" value="<?php echo $middleName; ?>">
                                        <input type="text" name="Suffix" placeholder="&nbsp Suffix (optional)"
                                            pattern="[A-Za-z ]+" title="Should only contain letters"
                                            oninput="this.value = capitalizeWords(this.value.slice(0, 25))"
                                            maxlength="25" value="<?php echo $suffix; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="second_row_input">
                                    <label class="label_bday">Birth date:</label>
                                    <input type="date" name="Birthdate" id="birthdate" placeholder="&nbsp Birthdate"
                                        max="2005-06-20" value="<?php echo $birthdate; ?>">
                                    <select name="CivilStatus" id="civil-status" class="civ_stat">
                                        <option value="Single" <?php if ($civilStatus === 'Single') echo 'selected'; ?>>
                                            Single</option>
                                        <option value="Married"
                                            <?php if ($civilStatus === 'Married') echo 'selected'; ?>>Married</option>
                                        <option value="Widowed"
                                            <?php if ($civilStatus === 'Widowed') echo 'selected'; ?>>Widowed</option>
                                        <option value="Divorced"
                                            <?php if ($civilStatus === 'Divorced') echo 'selected'; ?>>Divorced</option>
                                    </select>
                                    <input type="text" name="ContactNumber" placeholder="&nbsp Contact Number"
                                        class="Cnum" pattern="09\d{9}"
                                        title="Should only contain 11 digits starting with 09" maxlength="11"
                                        minlength="11" value="<?php echo $contactNumber; ?>">

                                    <select name="SEX" class="gender">
                                        <option value="" disabled selected hidden>Choose One</option>
                                        <option value="MALE" <?php if ($sex === 'MALE') echo 'selected'; ?>>MALE
                                        </option>
                                        <option value="FEMALE" <?php if ($sex === 'FEMALE') echo 'selected'; ?>>FEMALE
                                        </option>
                                        <option value="OTHERS" <?php if ($sex === 'OTHERS') echo 'selected'; ?>>OTHERS
                                        </option>
                                    </select>
                                </div>
                                <br>
                                <div class="add_input">
                                <input type="text" name="CompleteAddress" placeholder="&nbsp Complete Address"
                                        class="Address" pattern="[A-Za-z0-9,-. ]+"
                                        title="Should only contain letters and numbers"
                                        oninput="this.value = capitalizeWords(this.value.slice(0, 30))" maxlength="30"
                                        value="<?php echo $completeAddress; ?>">
                                        
                                    <input type="text" name="City" placeholder="&nbsp City" class="Address"
                                        pattern="[A-Za-z ]+" title="Should only contain letters"
                                        oninput="this.value = capitalizeWords(this.value.slice(0, 50))" maxlength="50"
                                        value="<?php echo $city; ?>">
                                </div>
                                <div class="third_row_input">
                                    <input type="text" name="ZipCode" placeholder="&nbsp Zip Code" pattern="[0-9]{4}"
                                        title="Should only contain 4 digits" maxlength="4" minlength="4"
                                        value="<?php echo $zipCode; ?>">
                                    <input type="text" name="Citizenship" placeholder="&nbsp Citizenship"
                                        pattern="[A-Za-z ]+" title="Should only contain letters"
                                        oninput="this.value = capitalizeWords(this.value.slice(0, 15))" maxlength="15"
                                        value="<?php echo $citizenship; ?>">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <header2>
                            <p class="headers">Account Credentials</p>
                        </header2>
                        <div class="fourth_row_input">
                            <input type="email" name="EmailAdd" id="emailInput" placeholder="&nbsp;Email Address"
                                pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" title="Invalid email address"
                                value="<?php echo $emailAddress; ?>">
                                <input type="text" name="NewUsername" placeholder="&nbsp;New Username" maxlength="10" value="<?php echo $username; ?>" required pattern="^[a-zA-Z0-9][a-zA-Z0-9!@#$%^&*()-_=+]{2}$">



                            <br>
                            <br>
                            <input type="password" name="pass" id="password" placeholder="&nbsp; New Password" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>">
<input type="password" name="Cpass" id="confirmPassword" placeholder="&nbsp; Confirm New Password">
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter <span id="x-icon">✖</span><span id="check-icon">✔</span></p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter <span id="x-icon">✖</span><span id="check-icon">✔</span></p>
  <p id="number" class="invalid">A <b>number</b> <span id="x-icon">✖</span><span id="check-icon">✔</span></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b> <span id="x-icon">✖</span><span id="check-icon">✔</span></p>
</div>
<div class="imgPrev" id="defaultProfileImage"></div>


                                <h3 class="UploadPic_Header">Upload your Profile Picture</h3>
                                <br>
                                <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer_SignUp" id="imageContainer">
                            <button class="Cancel">CANCEL</button>
                            <button type="submit" class="Submit">SUBMIT</button>
                            <div class="loader"></div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  // Capitalize every word
  function capitalizeWords(value) {
    value = value.replace(/\s{2,}/g, ' ');
    return value.replace(/\b\w/g, function (match) {
      return match.toUpperCase();
    }).replace(/\b\w+/g, function (match) {
      return match.charAt(0).toUpperCase() + match.slice(1).toLowerCase();
    });
  }

  // Password validation
  var passwordInput = document.getElementById("password");
  var confirmPasswordInput = document.getElementById("confirmPassword");

  passwordInput.addEventListener("input", validatePassword);
  confirmPasswordInput.addEventListener("input", validatePassword);

  function validatePassword() {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;

    // Regex pattern to check for at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character
    var regexPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;

    if (regexPattern.test(password) && regexPattern.test(confirmPassword)) {
      // Passwords match and meet the validation requirements
      // You can perform additional logic here if needed
      console.log("Passwords are valid.");
    } else {
      // Passwords do not match or do not meet the validation requirements
      console.log("Passwords are invalid.");
    }
  }

  // Profile picture preview
  $("#profile_picture").change(function () {
    var file = this.files[0];
    if (file instanceof Blob) {
      var reader = new FileReader();
      reader.onload = function (e) {
        var imgElement = $("<img>");
        imgElement.attr("src", e.target.result);
        imgElement.addClass("preview-image");
        imgElement.css("max-width", "150px");
        imgElement.css("max-height", "150px");
        imgElement.css("border-radius", "50%");
        imgElement.css("object-fit", "cover");
        imgElement.css("border", "2px solid black");
        $(".imgPrev").empty();
        $(".imgPrev").append(imgElement);
      };
      reader.readAsDataURL(file);
    } else {
      console.error("Invalid file object.");
    }
  });

  // Default profile picture preview
  var defaultImage = $('<img id="defaultProfileImage">');
  defaultImage.attr("src", "../uploads/<?php echo basename($profilePicture); ?>");
  defaultImage.addClass("preview-image");
  defaultImage.css("max-width", "150px");
  defaultImage.css("max-height", "150px");
  defaultImage.css("border-radius", "50%");
  defaultImage.css("object-fit", "cover");
  defaultImage.css("border", "2px solid black");
  $(".imgPrev").empty();
  $(".imgPrev").append(defaultImage);

  // File selection test
  $("#profile_picture").change(function () {
    var file = this.files[0];
    if (file) {
      console.log('File selected:', file.name);
    } else {
      console.log('No file selected.');
    }
  });

  // Password strength meter
  $(document).ready(function () {
    var passwordInput = document.getElementById("password");
    var checkIcons = document.querySelectorAll("#check-icon");
    var xIcons = document.querySelectorAll("#x-icon");

    passwordInput.addEventListener("focus", function () {
      document.getElementById("message").style.display = "block";
    });

    passwordInput.addEventListener("blur", function () {
      document.getElementById("message").style.display = "none";
    });

    passwordInput.addEventListener("keyup", function () {
      var lowercaseRegex = /[a-z]/;
      var uppercaseRegex = /[A-Z]/;
      var numberRegex = /[0-9]/;
      var minLength = 8;

      var lowercaseValid = lowercaseRegex.test(passwordInput.value);
      var uppercaseValid = uppercaseRegex.test(passwordInput.value);
      var numberValid = numberRegex.test(passwordInput.value);
      var lengthValid = passwordInput.value.length >= minLength;

      document.getElementById("letter").classList.toggle("invalid", !lowercaseValid);
      document.getElementById("capital").classList.toggle("invalid", !uppercaseValid);
      document.getElementById("number").classList.toggle("invalid", !numberValid);
      document.getElementById("length").classList.toggle("invalid", !lengthValid);

      for (var i = 0; i < checkIcons.length; i++) {
        checkIcons[i].style.display = "none";
      }
      for (var i = 0; i < xIcons.length; i++) {
        xIcons[i].style.display = "inline-block";
      }

      if (lowercaseValid) {
        document.getElementById("letter").querySelector("#check-icon").style.display = "inline-block";
        document.getElementById("letter").querySelector("#x-icon").style.display = "none";
      }
      if (uppercaseValid) {
        document.getElementById("capital").querySelector("#check-icon").style.display = "inline-block";
        document.getElementById("capital").querySelector("#x-icon").style.display = "none";
      }
      if (numberValid) {
        document.getElementById("number").querySelector("#check-icon").style.display = "inline-block";
        document.getElementById("number").querySelector("#x-icon").style.display = "none";
      }
      if (lengthValid) {
        document.getElementById("length").querySelector("#check-icon").style.display = "inline-block";
        document.getElementById("length").querySelector("#x-icon").style.display = "none";
      }
    });
  });

  $(document).ready(function () {
    $("#SignUp_Student").submit(function (event) {
      event.preventDefault();

      var password = $('#password').val();
      var confirmPassword = $('#confirmPassword').val();

      var inputs = $(this).find('input');
      var isValid = true;
      inputs.each(function () {
        if (!$(this)[0].checkValidity()) {
          isValid = false;
          $(this).addClass('input-error');
        } else {
          $(this).removeClass('input-error');
        }
      });

      if (password !== confirmPassword) {
        alert("Passwords do not match");
        isValid = false;
      }

      var lowercaseRegex = /[a-z]/;
      var uppercaseRegex = /[A-Z]/;
      var numberRegex = /[0-9]/;
      var minLength = 8;

      var isLowerCaseValid = lowercaseRegex.test(password);
      var isUpperCaseValid = uppercaseRegex.test(password);
      var isNumberValid = numberRegex.test(password);
      var isLengthValid = password.length >= minLength;

      if ((password !== '' || confirmPassword !== '') && (!isLowerCaseValid || !isUpperCaseValid || !isNumberValid || !isLengthValid)) {
        alert("Password does not meet the requirements");
        isValid = false;
      }

      if (isValid) {
        var formData = new FormData(this);

        var submitButton = $('.Submit');
        submitButton.prop('disabled', true);
        submitButton.html('<span class="loading-spinner"></span>Loading...');

        $.ajax({
          url: "update.php",
          type: "POST",
          data: formData,
          dataType: "html",
          contentType: false,
          processData: false,
          success: function (response) {
            alert("Update successful");
            location.reload();
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
            alert("Update failed");
          },
          complete: function () {
            submitButton.prop('disabled', false);
            submitButton.text('SUBMIT');
          }
        });
      } else {
        return false;
      }
    });

    $(".Cancel").click(function () {
      location.reload();
    });
  });
</script>


</body>

</html>