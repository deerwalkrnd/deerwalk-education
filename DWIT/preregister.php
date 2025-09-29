<?php
require_once("../DWIT/system/application_top.php");

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];
$pgName = 'Pre Register';
include('./include/header.php');
?>

<div class="col-md-8">
    <h4 style="padding-bottom: 0.4rem;" class="r-sub-title text-center">ADMISSION INQUIRY | BSc. CSIT/BCA </h4>

    <p style="font-size:0.9rem;line-height:1.4rem; color: #0f5288">
    Kindly fill the form so that we can call &amp; attend to your inquiries regarding admissions in 𝗕𝗦𝗰. 𝗖𝗦𝗜𝗧 / 𝗕𝗖𝗔 program at Deerwalk Institute of Technology.
</p>

    <form id="pre-register" action="./ajax/pre-register.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
        <div class="form-group">
            <label for="fullname" class="form-label"> Full Name: </label><br>
            <input type="text" id="fullname" name="fullname" required maxlength="100" class="form-input">
            <label id="fullname-error" class="error text-danger" for="fullname"></label>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label"> Phone No.: </label><br>
            <input type="text" id="phone" name="phone" required maxlength="15" class="form-input">
            <label id="phone-error" class="error text-danger" for="phone"></label>
        </div>
        <div class="form-group">
                <label for="full_name"> Program of Interest: </label><br>
                
                <div class="form-check form-check-inline">
                    <input type="radio" name="interest" class="form-check-input ml-2" id="csit" value="1" required>

                    <label for="csit" class="form-check-label">CSIT</label>
                    
                    <input type="radio" name="interest" class="form-check-input ml-5" id="bca" value="2">
                    <label for="bca" class="form-check-label">BCA</label>
                    
                    <input type="radio" name="interest" class="form-check-input ml-5" id="both" value="3">
                    <label for="both" class="form-check-label">BOTH</label>
                </div>
                <br>
                <label id="interest-error" class="error text-danger" for="interest"></label>
            </div>
        <div class="form-group">
                    <label for="source" class="form-label">
                        How did you come to know about Deerwalk Institute of Technology?<br>
                        <i><small>Select all that apply</small></i>
                    </label> <br>
                    <table class="table">
                        <tbody><tr>
                            <td class="fntwgt-400"><input type="checkbox" id="dwitStudent" name="source[]" value="DWIT Students"> <label for="dwitStudent">DWIT Students</label> </td>
                            <td class="fntwgt-400"><input type="checkbox" id="dwitStaff" name="source[]" value="DWIT Staff"> <label for="dwitStaff">DWIT Staff</label> </td>
                            <td class="fntwgt-400"><input type="checkbox" id="deerwalkServices" name="source[]" value="Deerwalk Services"> <label for="deerwalkServices">Deerwalk Services</label></td>
                        </tr>
                        <tr>
                            <td class="fntwgt-400"><input type="checkbox" id="deerwalkEmployees" name="source[]" value="Deerwalk Employees"> <label for="deerwalkEmployees">Deerwalk Employees</label></td>
                            <td class="fntwgt-400"><input type="checkbox" id="dwitTraining" name="source[]" value="DWIT Training"> <label for="dwitTraining">DWIT Training</label></td>
                            <td class="fntwgt-400"><input type="checkbox" id="dwitNews" name="source[]" value="DWIT News"> <label for="dwitNews">DWIT News</label></td>
                        </tr>
                        <tr>
                            <td class="fntwgt-400"> <input type="checkbox" id="deerwalkSifal" name="source[]" value="Deerwalk Sifal School"> <label for="deerwalkSifal">Deerwalk Sifal School</label> </td>
                            <td class="fntwgt-400"> <input type="checkbox" id="dlc" name="source[]" value="Deerwalk Learning Center"> <label for="dlc">Deerwalk Learning Center</label> <br> </td>
                            <td class="fntwgt-400"> <input type="checkbox" id="socailMedia" name="source[]" value="Social Media"> <label for="socailMedia">Social Media</label> </td>
                        </tr>
                        <tr>
                            <td class="fntwgt-400"> <input type="checkbox" id="WordOfMouth" name="source[]" value="Word of Mouth"> <label for="WordOfMouth">Word of Mouth</label> </td>
                            <td class="fntwgt-400"> <input type="checkbox" id="it4d" name="source[]" value="IT4D"> <label for="it4d">IT4D</label> </td>
                            <td class="fntwgt-400"> <input type="checkbox" id="jobFair" name="source[]" value="DWIT Job Fair"> <label for="jobFair">DWIT Job Fair</label> </td>
                        </tr>
                        <tr>
                            <td class="fntwgt-400"> <input type="checkbox" name="source[]" value="other" id="otherS" onchange="this.form.other.disabled=!this.checked">  <label for="otherS">Other</label> </td>
                        </tr>
                        </tbody></table>
            </div>

        <!-- <a href="https://deerwalk.edu.np/DWIT/admission.php"> -->
        <input type="submit" name="formSubmitted" class="btn btn-primary book-btn btn-lg text-center" value="Submit">
        <!-- </a> -->
    </form>
</div>

<?php include('./include/footer.php') ?>
