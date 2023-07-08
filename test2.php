<?php
$page = "registry";
include_once 'header.php';
include 'model/operations';
$conn = connect();
$beneficiaryname = $_GET['beneficiary_name'];
$sql = "SELECT * FROM registry WHERE beneficiary_name = '$beneficiaryname'";
$row = select_rows($sql)[0];
?>

<style>
    .HeaderForm {
        text-transform: uppercase;
        /*text-align:center;*/
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .NextBtn1 {
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .NextBtn1 button {
        float: right;
    }

    .Section2,
    .Section3,
    .Section4,
    .Section5,
    .Section6,
    .Section7 {
        display: none;
    }
</style>

<div class="container">
    <h3 class="p-3">E-Registry</h3>

    <?php if (!isset($_SESSION['project'])) { ?>
        <section class="connectedSortable">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project</h3>
                </div>
                <form method="post" action="model/change_project.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Choose project</label>
                            <select class="form-control" required name="project">
                                <option disabled value="">choose project</option>
                                <?php
                                $sql = "select * from project";
                                $row = select_rows($sql);
                                foreach ($row as $item) {
                                    ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['project_acronym'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <?php
                    submit();
                    ?>
                </form>
            </div>
        </section>
    <?php } else {
        $sql = "select * from project where id = '$_SESSION[project]'";
        $row = select_rows($sql)[0];
        ?>

        <div class="row">
            <h6 class="p-3">You are adding a beneficiary under <?= $row['project_acronym'] ?>
                <span class="text-blue">
                    <a href="model/clear_project.php">
                        change
                    </a>
                </span>
            </h6>
            <section class="connectedSortable col-12">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">E-Registry Form</h3>
                    </div>
                    <form id="testform" method="post" enctype="multipart/form-data" action="model/create_registry.php">
                        <div class="card-body">
                            <!-- SECTION 1 START -->
                            <div class="Section1" id="Section1">
                                <div class="form-check">
                                    <label for="gdpr" class="form-label">GDPR</label>
                                    <input class="form-check-input" name="gdpr" type="text" value="gdpr_yes"
                                        id="flexCheckDefault1">
                                </div>
                                <div class="form-check">
                                    <label for="GDPR" class="form-label">data collection</label>
                                    
                                    
                                <input class="form-check-input" name="gdpr" type="text" value="gdpr_yes" id="flexCheckDefault1">
                            </div>
                            
                            <div class="form-check">
                                <label for="GDPR" class="form-label">data collection </label>
                                <input class="form-check-input" name="data_collection" type="text" value="data_collection_yes" id="flexCheckDefault2">
                            </div>

                            <div class="NextBtn1">
                                <button type="button" class="btn btn-primary" id="next1">Next</button>
                            </div>
                        </div>
						<!-- SECTION 1 END -->


						<!-- SECTION 2 START -->
						<div class="Section2" id="Section2">
							<h4>Farmer Placement </h4>

							<div class="form-group">
							    <div class="form-group">
                                  <label for="RegistrationDate" class="form-label">Registration Date </label>
                                  <input type="text" name="registration_date" id="registration_date" class="form-control" id="RegistrationDate">
                                </div>
                                


								<!--<label for="RegistrationDate" class="form-label">Registration Date </label>-->
								<!--<input type="date" name="registration_date" id="registration_date"  class="form-control" id="RegistrationDate">-->
							</div>

							<div class="form-group">
								<label class="form-label">Type of season </label>
								<select name="response_type" class="form-control form-select" id="response_type"  aria-label="Default select example">
									<option  disabled>Choose Type of Season</option>
									<?php
									$sql = "select * from seasons";
									$seasons = select_rows($sql);
									foreach ($seasons as $item){
									?>
									<option ><?= $item['name']?></option>
									<?php } ?>

								</select>
							</div>

							<div class="form-group">
								<label class="form-label">Type of Intervention </label>
								<!--<input type="text" name="beneficiary_name" class="form-control" id="BeneficiaryName">-->
								<select name="intervention_type" class="form-control form-select" id="intervention_type"  aria-label="Default select example">
									<option selected disabled>Choose Type of intervention</option>
									<option value="Nutrition Vouchers">Nutrition Vouchers </option>
									<option value="Cash for seeds">Cash for seeds </option>
									<option value="Input trade fair">Input trade fair </option>
									<option value="Agriculture Kits Distribution">Agriculture Kits Distribution </option>
									<option value="Livestock Vaccination">Livestock Vaccination </option>
									<option value="Livestock Treatment">Livestock Treatment </option>
								</select>
							</div>

							<div class="form-group">
								<label class="form-label">Agency/ Organization benefiting from </label>
								<input readonly name = "agency_type" class="form-control" value="<?= $row['donor'] ?>" >
							</div>

							<div class="NextBtn1">
							    <button type="button" class="btn btn-primary" id="next2">Next</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back2">Back</button>
							
							</div>
						</div>
						<!-- SECTION 2 END -->


						<!-- SECTION 3 START -->
						<div class="Section3" id="Section3">
							<h4>Beneficiary details </h4>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
                                      <label for="BeneficiaryName" class="form-label">Beneficiary Name*</label>
                                      <input type="text" name="beneficiary_name" class="form-control" id="BeneficiaryName">
                                     
                                    </div>
                                </div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
                                      <label for="BeneficiaryAge" class="form-label">Beneficiary Age*</label>
                                      <input type="number" name="beneficiary_age" class="form-control" min="18" max="100" id="BeneficiaryAge">
                                      <span id="age-validation"></span>
                                    </div>
                                </div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label for="BeneficiaryEmail" class="form-label">Beneficiary Email</label>
										 <input type="email" name="beneficiary_email" class="form-control" id="email" placeholder="Enter your Email Address">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="beneficiary_soc_name" class="form-label">Beneficiary Society Name</label>
										<input type="text" name="beneficiary_soc_name" class="form-control" id="beneficiary_soc_name">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="beneficiary_soc_num" class="form-label">Beneficiary Society Number</label>
										<input type="text" name="beneficiary_soc_num" class="form-control" id="beneficiary_soc_num">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label class="form-label">Gender*</label>
										<input type="text" name="beneficiary_gender" class="form-control" id="gender">
										<!--<select name="beneficiary_gender" id="gender" class="form-control form-select" aria-label="Default select example">-->
										<!--	<option selected disabled>Choose Gender</option>-->
										<!--	<option value="Male">Male </option>-->
										<!--	<option value="Female">Female</option>-->
										<!--</select>-->
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label class="form-label">Marital Status*</label>
										<input type="text" name="beneficiary_marital_status" class="form-control" id="marital_status">
										<!--<select name="beneficiary_marital_status" id="marital_status" class="form-control form-select" aria-label="Default select example">-->
										<!--	<option selected disabled>Choose Marital Status</option>-->
										<!--	<option value="Single">Single </option>-->
										<!--	<option value="Married">Married</option>-->
										<!--	<option value="Divorced">Divorced </option>-->
										<!--	<option value="Widowed">Widowed</option>-->
										<!--</select>-->
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="BeneficiaryPhone" class="form-label">Beneficiary Phone*</label>
										<input type="text" name="beneficiary_phone" class="form-control" id="BeneficiaryPhone">
									</div>
								</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">

								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="BeneficiaryPassport" class="form-label">Beneficiary ID/Passport Num (optional).</label>
										<input type="text" name="beneficiary_passport" class="form-control" id="BeneficiaryPassport">
									</div>

								</div>

							</div>


							<div class="NextBtn1">
							    <button type="button" class="btn btn-primary" id="next3">Next</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back3">Back</button>
								
							</div>
						</div>
						<!-- SECTION 3 END -->


						<!-- SECTION 4 START -->
						<div class="Section4" id="Section4">
							<h4>Alternative Beneficiary details </h4>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="AlternativeBeneficiaryName" class="form-label">Alt. Beneficiary Name</label>
										<input type="text" name="alt_beneficiary_name" class="form-control" id="BeneficiaryName">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="AlternativeBeneficiaryAge" class="form-label">Alt. Beneficiary Age</label>
										<input type="number" name="alt_beneficiary_age" class="form-control">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label class="form-label">Gender</label>
										<input type="text" name="alt_beneficiary_gender" class="form-control" id="alt_beneficiary_gender">
										<!--<select name="alt_beneficiary_gender" class="form-control form-select"  aria-label="Default select example">-->
										<!--	<option   selected disabled>Choose Gender</option>-->
										<!--	<option value="Male">Male </option>-->
										<!--	<option value="Female">Female</option>-->
										<!--	<option value="Other">Other</option>-->
										<!--</select>-->
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label for="AlternativeBeneficiaryPhone" class="form-label">Alt. Beneficiary Phone</label>
										<input type="text" name="alt_beneficiary_phone" class="form-control" id="altBeneficiaryPhone">
									</div>
								</div>
							</div>

							<div class="NextBtn1">
							    <button type="button" class="btn btn-primary" id="next4">Next</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back4">Back</button>
								
							</div>
						</div>
						<!-- SECTION 4 END -->


						<!-- SECTION 5 START -->
						<div class="Section5" id="Section5">
							<h4>Land Details </h4>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label for="land_size" class="form-label">Size of land (Fedans)</label>
										<input type="number" name="land_size" class="form-control">
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label class="form-label">Land Use</label>
										<input type="text" name="land_use" class="form-control" id="land_use" >
										<!--<select name="land_use" id="land_use"class="form-control form-select" aria-label="Default select example">-->
										<!--	<option selected disabled>Choose Land Use</option>-->
										<!--	<option value="Forestry">Forestry </option>-->
										<!--	<option value="Farming">Farming</option>-->
										<!--	<option value="Livestock Herding">Livestock Herding </option>-->
										<!--	<option value="Floriculture">Floriculture</option>-->
										<!--</select>-->
									</div>
								</div>


							</div>

							<div class="NextBtn1">
							    <button type="button" class="btn btn-primary" id="next5">Next</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back5">Back</button>
								
							</div>
						</div>
						<!-- SECTION 5 END -->


						<!-- SECTION 6 START -->
						<div class="Section6" id="Section6">
							<h4>Location details </h4>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
                                      <label class="form-label" for="state">State</label>
                                      <input type="text" name="state" class="form-control" id="state" >
                                      <!--<select id="state" size="1" name="state" class="form-control form-select" aria-label="Default select example">-->
                                      <!--  <option value="" selected="selected">-- Select state --</option>-->
                                      <!--</select>-->
                                      <!--<script src="location.js"></script>-->
                                    </div>
                                    
                                    <div class="form-group">
                                      <label class="form-label" for="county">County</label>
                                      <input type="text" name="county" class="form-control" id="county" min="1" >
                                      <!--<select id="county" size="1" name="county" class="form-control form-select" aria-label="Default select example" disabled>-->
                                      <!--  <option value="" selected="selected">-- Select county --</option>-->
                                      <!--</select>-->
                                    </div>
                                    
                                    <div class="form-group">
                                      <label class="form-label" for="payam">Payam</label>
                                      <input type="text" name="payam" class="form-control" id="payam" >
                                      <!--<select id="payam" size="1" name="payam" class="form-control form-select" aria-label="Default select example" disabled>-->
                                      <!--  <option value="" selected="selected">-- Select payam --</option>-->
                                      <!--</select>-->
                                    </div>
                                    <div class="form-group">
                                      <label class="form-label" for="boma">Boma</label>
                                      <input type="number" name="boma" class="form-control" id="boma" >
                                      <!--<select id="boma" size="1" name="boma" class="form-control form-select" aria-label="Default select example" disabled>-->
                                      <!--  <option value="" selected="selected">-- boma --</option>-->
                                      <!--</select>-->
                                    </div>

                                </div>

							</div>

							<div class="NextBtn1">

								<button type="button" class="btn btn-primary" id="next6">Next</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back6">Back</button>
							</div>
						</div>
						<!-- SECTION 6 END -->



						<!-- SECTION 7 START -->
						<div class="Section7" id="Section7">
							<h4>Bio Data Capture </h4>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group ">
										<label for="my_img">Image</label>
										<input type="file"  accept=".png, .jpg, .jpeg" id="my_img" value="" class="form-control" name="picture" placeholder="picture" >
									</div>
								</div>
							</div>

							<div class="NextBtn1">
							    <button type="button" id="btnsub" class="btn btn-primary">Submit Data</button>
								<button type="button" class="btn btn-secondary ml-2 mr-2" id="back7">Back</button>
								
							</div>
						</div>
						<!-- SECTION 7 END -->

					</div>
				</form>
			</div>
		</section>
	</div>
	<?php } ?>
</div>


<style>
    .Constituencies{
        display:none;
    }
</style>
<script>

</script>
<script>

</script>
<script>

</script>
<script>


</script>
<script>


</script>

<script>
	$(document).ready(function() {
	

		//GO TO SECTION 2
		$('#next1').click(function() {
			$('#Section1').css('display', 'none');
			$('#Section2').css('display', 'block');
		});

		//GO TO SECTION 3
		$('#next2').click(function() {
			$('#Section2').css('display', 'none');
			$('#Section3').css('display', 'block');
		});

		//GO TO SECTION 4
		$('#next3').click(function() {
			$('#Section3').css('display', 'none');
			$('#Section4').css('display', 'block');
		});

		//GO TO SECTION 5
		$('#next4').click(function() {
			$('#Section4').css('display', 'none');
			$('#Section5').css('display', 'block');
		});

		//GO TO SECTION 6
		$('#next5').click(function() {
			$('#Section5').css('display', 'none');
			$('#Section6').css('display', 'block');
		});

		//GO TO SECTION 7
		$('#next6').click(function() {
			$('#Section6').css('display', 'none');
			$('#Section7').css('display', 'block');
		});




		//GO BACK TO SECTION 1
		$('#back2').click(function() {
			$('#Section1').css('display', 'block');
			$('#Section2').css('display', 'none');
		});

		//GO BACK TO SECTION 2
		$('#back3').click(function() {
			$('#Section2').css('display', 'block');
			$('#Section3').css('display', 'none');
		});

		//GO BACK TO SECTION 3
		$('#back4').click(function() {
			$('#Section3').css('display', 'block');
			$('#Section4').css('display', 'none');
		});

		//GO BACK TO SECTION 4
		$('#back5').click(function() {
			$('#Section4').css('display', 'block');
			$('#Section5').css('display', 'none');
		});

		//GO BACK TO SECTION 5
		$('#back6').click(function() {
			$('#Section5').css('display', 'block');
			$('#Section6').css('display', 'none');
		});

		//GO BACK TO SECTION 6
		$('#back7').click(function() {
			$('#Section6').css('display', 'block');
			$('#Section7').css('display', 'none');
		});
		
		
		


	})
</script>
<script>


</script>

    <script>
        function add_options(table,id){

            $("#"+table).text('');
            $.post("add_data.php",
                {
                    table: table,
                    id: id
                },
                function(data, status){
                    data = JSON.parse(data);
                    var option = '<option value="">Select constituencies</option>';
                    data.forEach(function (element,index){
                        option+= '<option value="'+element.name+'">'+element.name+'</option>'
                    });
                    $("#"+table).append(option);
                    if(table == "sub_counties"){
                        $("#subload").hide();
                    }
                });
        }

        $(document).ready(function (){
            $("#sub").text("");

            $('#state').on('change', function() {
                $("#subload").show();
                var id = this.value;
                add_options("sub_counties",id);
            });

        })
    </script>

<script>
	function image_preview(my_img, img_loader) {
		$(function() {
			$(my_img).change(function(event) {
				let img = URL.createObjectURL(event.target.files[0]);
				$(img_loader).attr("src", img);
				console.log(event);
			});
		});
	}

	image_preview("#my_img", "#img_loader");
</script>
<?php
include_once 'footer.php';