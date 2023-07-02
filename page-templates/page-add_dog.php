<?php
/**
 * The template for adding new god
 * Template Name: Dodaj psa
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/page', 'header' ); ?>
        <div class="container-lg page-container-sn">
            
			<?php 
            // if(isset($_POST['hodowca'])){
            //     echo 'Hodowca: ' .$_POST['hodowca'].'<br><br>';
            //     echo 'Właściciel: ' .$_POST['wlasciciel'].'<br><br>';

            // }

             ?>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

            <!-- Post insert form start -->
            <form method="post" enctype="multipart/form-data" action="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 pb-3">
                            <!-- Dog name -->
                            <div class="form-group">
                                <label for="dog-name">Dog name</label>
                                <input type="text" name="post_title" class="form-control" id="dog-name" placeholder="Dog name">
                            </div>
                            <!-- Gender -->
                            <div class="form-group">
                                <label for="dog-gender">Gender</label>
                                <select class="form-control" id="dog-gender">
                                  <option disabled selected value> -- select gender -- </option>
                                  <option value="male">Male</option>
                                  <option  value="female">Female</option>
                                </select>
                            </div>

                            <!-- Owner name-->
                            <div class="form-group">
                                <label for="owner-name">Owner name</label>
                                <input type="text" name="wlasciciel" class="form-control" id="owner-name" placeholder="Owner name">
                            </div>

                            <!-- Owner country -->
                            <div class="form-group">
                                <label>Owner's nationality</label>
                                <div id="owner-dropdown"></div>
                            </div>

                             <!-- Breeder name -->
                            <div class="form-group">
                                <label for="breeder-name">Breeder name</label>
                                <input type="text" name="hodowca" class="form-control" id="breeder-name" placeholder="Breeder name">
                            </div>

                            <!-- Breeder country -->
                            <div class="form-group">
                                <label>Breeder's nationality</label>
                                <div id="breeder-dropdown"></div>
                            </div>
                         
                                  
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 pb-3">
                            <!-- Sire -->
                            <div class="form-group">
                                <label for="sire">Sire</label>
                                <input type="text" name="ojciec_sire" class="form-control" id="sire" placeholder="Search for sire">
                            </div>
                            <!-- Dam -->
                            <div class="form-group">
                                <label for="dam">Dam</label>
                                <input type="text" name="matka_dam" class="form-control" id="dam" placeholder="Search for dam">
                            </div>

                            <!-- Birth date-->
                            <div class="form-group">
                                <label for="birth-date">Birth date</label>
                                <div class="datepicker date input-group">
                                    <input type="text" name="data_urodzenia" placeholder="Choose Date" class="form-control" id="birth-date">
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>

                            </div>

                            <!-- Titles -->
                            <div class="form-group">
                                <label for="titles">Titles (optional)</label>
                                <textarea class="form-control" id="titles" name="tytuly" style="height:126px"></textarea>
                            </div>

                            <!-- Photo -->
                            <div class="form-group">
                                <label for="dog-photo">Dog photo</label>
                                <input type="file" class="form-control-file" id="dog-photo">
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Submit btn -->
                <div>
                    <input type="submit" name="insert_rodowod_psa" value="Create a dog's pedigree" class="btn btn-gold text-white">
                </div>
            </form>
            <!-- Post insert form end -->
		</div>
	</main><!-- #main -->
	<script>

        jQuery(document).ready(function($) {
           var countries = [
                { "text": "Afghanistan", "value": "AF" },
                { "text": "Åland Islands", "value": "AX" },
                { "text": "Albania", "value": "AL" },
                { "text": "Algeria", "value": "DZ" },
                { "text": "American Samoa", "value": "AS" },
                { "text": "Andorra", "value": "AD" },
                { "text": "Angola", "value": "AO" },
                { "text": "Anguilla", "value": "AI" },
                { "text": "Antarctica", "value": "AQ" },
                { "text": "Antigua and Barbuda", "value": "AG" },
                { "text": "Argentina", "value": "AR" },
                { "text": "Armenia", "value": "AM" },
                { "text": "Aruba", "value": "AW" },
                { "text": "Australia", "value": "AU" },
                { "text": "Austria", "value": "AT" },
                { "text": "Azerbaijan", "value": "AZ" },
                { "text": "Bahamas", "value": "BS" },
                { "text": "Bahrain", "value": "BH" },
                { "text": "Bangladesh", "value": "BD" },
                { "text": "Barbados", "value": "BB" },
                { "text": "Belarus", "value": "BY" },
                { "text": "Belgium", "value": "BE" },
                { "text": "Belize", "value": "BZ" },
                { "text": "Benin", "value": "BJ" },
                { "text": "Bermuda", "value": "BM" },
                { "text": "Bhutan", "value": "BT" },
                { "text": "Bolivia", "value": "BO" },
                { "text": "Bosnia and Herzegovina", "value": "BA" },
                { "text": "Botswana", "value": "BW" },
                { "text": "Bouvet Island", "value": "BV" },
                { "text": "Brazil", "value": "BR" },
                { "text": "British Indian Ocean Territory", "value": "IO" },
                { "text": "Brunei Darussalam", "value": "BN" },
                { "text": "Bulgaria", "value": "BG" },
                { "text": "Burkina Faso", "value": "BF" },
                { "text": "Burundi", "value": "BI" },
                { "text": "Cambodia", "value": "KH" },
                { "text": "Cameroon", "value": "CM" },
                { "text": "Canada", "value": "CA" },
                { "text": "Cape Verde", "value": "CV" },
                { "text": "Cayman Islands", "value": "KY" },
                { "text": "Central African Republic", "value": "CF" },
                { "text": "Chad", "value": "TD" },
                { "text": "Chile", "value": "CL" },
                { "text": "China", "value": "CN" },
                { "text": "Christmas Island", "value": "CX" },
                { "text": "Cocos (Keeling) Islands", "value": "CC" },
                { "text": "Colombia", "value": "CO" },
                { "text": "Comoros", "value": "KM" },
                { "text": "Congo", "value": "CG" },
                { "text": "Congo, The Democratic Republic of the", "value": "CD" },
                { "text": "Cook Islands", "value": "CK" },
                { "text": "Costa Rica", "value": "CR" },
                { "text": "Cote D'Ivoire", "value": "CI" },
                { "text": "Croatia", "value": "HR" },
                { "text": "Cuba", "value": "CU" },
                { "text": "Cyprus", "value": "CY" },
                { "text": "Czech Republic", "value": "CZ" },
                { "text": "Denmark", "value": "DK" },
                { "text": "Djibouti", "value": "DJ" },
                { "text": "Dominica", "value": "DM" },
                { "text": "Dominican Republic", "value": "DO" },
                { "text": "Ecuador", "value": "EC" },
                { "text": "Egypt", "value": "EG" },
                { "text": "El Salvador", "value": "SV" },
                { "text": "Equatorial Guinea", "value": "GQ" },
                { "text": "Eritrea", "value": "ER" },
                { "text": "Estonia", "value": "EE" },
                { "text": "Ethiopia", "value": "ET" },
                { "text": "Falkland Islands (Malvinas)", "value": "FK" },
                { "text": "Faroe Islands", "value": "FO" },
                { "text": "Fiji", "value": "FJ" },
                { "text": "Finland", "value": "FI" },
                { "text": "France", "value": "FR" },
                { "text": "French Guiana", "value": "GF" },
                { "text": "French Polynesia", "value": "PF" },
                { "text": "French Southern Territories", "value": "TF" },
                { "text": "Gabon", "value": "GA" },
                { "text": "Gambia", "value": "GM" },
                { "text": "Georgia", "value": "GE" },
                { "text": "Germany", "value": "DE" },
                { "text": "Ghana", "value": "GH" },
                { "text": "Gibraltar", "value": "GI" },
                { "text": "Greece", "value": "GR" },
                { "text": "Greenland", "value": "GL" },
                { "text": "Grenada", "value": "GD" },
                { "text": "Guadeloupe", "value": "GP" },
                { "text": "Guam", "value": "GU" },
                { "text": "Guatemala", "value": "GT" },
                { "text": "Guernsey", "value": "GG" },
                { "text": "Guinea", "value": "GN" },
                { "text": "Guinea-Bissau", "value": "GW" },
                { "text": "Guyana", "value": "GY" },
                { "text": "Haiti", "value": "HT" },
                { "text": "Heard Island and Mcdonald Islands", "value": "HM" },
                { "text": "Holy See (Vatican City State)", "value": "VA" },
                { "text": "Honduras", "value": "HN" },
                { "text": "Hong Kong", "value": "HK" },
                { "text": "Hungary", "value": "HU" },
                { "text": "Iceland", "value": "IS" },
                { "text": "India", "value": "IN" },
                { "text": "Indonesia", "value": "ID" },
                { "text": "Iran, Islamic Republic Of", "value": "IR" },
                { "text": "Iraq", "value": "IQ" },
                { "text": "Ireland", "value": "IE" },
                { "text": "Isle of Man", "value": "IM" },
                { "text": "Israel", "value": "IL" },
                { "text": "Italy", "value": "IT" },
                { "text": "Jamaica", "value": "JM" },
                { "text": "Japan", "value": "JP" },
                { "text": "Jersey", "value": "JE" },
                { "text": "Jordan", "value": "JO" },
                { "text": "Kazakhstan", "value": "KZ" },
                { "text": "Kenya", "value": "KE" },
                { "text": "Kiribati", "value": "KI" },
                { "text": "Korea, Democratic People'S Republic of", "value": "KP" },
                { "text": "Korea, Republic of", "value": "KR" },
                { "text": "Kuwait", "value": "KW" },
                { "text": "Kyrgyzstan", "value": "KG" },
                { "text": "Lao People'S Democratic Republic", "value": "LA" },
                { "text": "Latvia", "value": "LV" },
                { "text": "Lebanon", "value": "LB" },
                { "text": "Lesotho", "value": "LS" },
                { "text": "Liberia", "value": "LR" },
                { "text": "Libyan Arab Jamahiriya", "value": "LY" },
                { "text": "Liechtenstein", "value": "LI" },
                { "text": "Lithuania", "value": "LT" },
                { "text": "Luxembourg", "value": "LU" },
                { "text": "Macao", "value": "MO" },
                { "text": "Macedonia, The Former Yugoslav Republic of", "value": "MK" },
                { "text": "Madagascar", "value": "MG" },
                { "text": "Malawi", "value": "MW" },
                { "text": "Malaysia", "value": "MY" },
                { "text": "Maldives", "value": "MV" },
                { "text": "Mali", "value": "ML" },
                { "text": "Malta", "value": "MT" },
                { "text": "Marshall Islands", "value": "MH" },
                { "text": "Martinique", "value": "MQ" },
                { "text": "Mauritania", "value": "MR" },
                { "text": "Mauritius", "value": "MU" },
                { "text": "Mayotte", "value": "YT" },
                { "text": "Mexico", "value": "MX" },
                { "text": "Micronesia, Federated States of", "value": "FM" },
                { "text": "Moldova, Republic of", "value": "MD" },
                { "text": "Monaco", "value": "MC" },
                { "text": "Mongolia", "value": "MN" },
                { "text": "Montserrat", "value": "MS" },
                { "text": "Morocco", "value": "MA" },
                { "text": "Mozambique", "value": "MZ" },
                { "text": "Myanmar", "value": "MM" },
                { "text": "Namibia", "value": "NA" },
                { "text": "Nauru", "value": "NR" },
                { "text": "Nepal", "value": "NP" },
                { "text": "Netherlands", "value": "NL" },
                { "text": "Netherlands Antilles", "value": "AN" },
                { "text": "New Caledonia", "value": "NC" },
                { "text": "New Zealand", "value": "NZ" },
                { "text": "Nicaragua", "value": "NI" },
                { "text": "Niger", "value": "NE" },
                { "text": "Nigeria", "value": "NG" },
                { "text": "Niue", "value": "NU" },
                { "text": "Norfolk Island", "value": "NF" },
                { "text": "Northern Mariana Islands", "value": "MP" },
                { "text": "Norway", "value": "NO" },
                { "text": "Oman", "value": "OM" },
                { "text": "Pakistan", "value": "PK" },
                { "text": "Palau", "value": "PW" },
                { "text": "Palestinian Territory, Occupied", "value": "PS" },
                { "text": "Panama", "value": "PA" },
                { "text": "Papua New Guinea", "value": "PG" },
                { "text": "Paraguay", "value": "PY" },
                { "text": "Peru", "value": "PE" },
                { "text": "Philippines", "value": "PH" },
                { "text": "Pitcairn", "value": "PN" },
                { "text": "Poland", "value": "PL" },
                { "text": "Portugal", "value": "PT" },
                { "text": "Puerto Rico", "value": "PR" },
                { "text": "Qatar", "value": "QA" },
                { "text": "Reunion", "value": "RE" },
                { "text": "Romania", "value": "RO" },
                { "text": "Russian Federation", "value": "RU" },
                { "text": "RWANDA", "value": "RW" },
                { "text": "Saint Helena", "value": "SH" },
                { "text": "Saint Kitts and Nevis", "value": "KN" },
                { "text": "Saint Lucia", "value": "LC" },
                { "text": "Saint Pierre and Miquelon", "value": "PM" },
                { "text": "Saint Vincent and the Grenadines", "value": "VC" },
                { "text": "Samoa", "value": "WS" },
                { "text": "San Marino", "value": "SM" },
                { "text": "Sao Tome and Principe", "value": "ST" },
                { "text": "Saudi Arabia", "value": "SA" },
                { "text": "Senegal", "value": "SN" },
                { "text": "Serbia and Montenegro", "value": "CS" },
                { "text": "Seychelles", "value": "SC" },
                { "text": "Sierra Leone", "value": "SL" },
                { "text": "Singapore", "value": "SG" },
                { "text": "Slovakia", "value": "SK" },
                { "text": "Slovenia", "value": "SI" },
                { "text": "Solomon Islands", "value": "SB" },
                { "text": "Somalia", "value": "SO" },
                { "text": "South Africa", "value": "ZA" },
                { "text": "South Georgia and the South Sandwich Islands", "value": "GS" },
                { "text": "Spain", "value": "ES" },
                { "text": "Sri Lanka", "value": "LK" },
                { "text": "Sudan", "value": "SD" },
                { "text": "Suriname", "value": "SR" },
                { "text": "Svalbard and Jan Mayen", "value": "SJ" },
                { "text": "Swaziland", "value": "SZ" },
                { "text": "Sweden", "value": "SE" },
                { "text": "Switzerland", "value": "CH" },
                { "text": "Syrian Arab Republic", "value": "SY" },
                { "text": "Taiwan, Province of China", "value": "TW" },
                { "text": "Tajikistan", "value": "TJ" },
                { "text": "Tanzania, United Republic of", "value": "TZ" },
                { "text": "Thailand", "value": "TH" },
                { "text": "Timor-Leste", "value": "TL" },
                { "text": "Togo", "value": "TG" },
                { "text": "Tokelau", "value": "TK" },
                { "text": "Tonga", "value": "TO" },
                { "text": "Trinidad and Tobago", "value": "TT" },
                { "text": "Tunisia", "value": "TN" },
                { "text": "Turkey", "value": "TR" },
                { "text": "Turkmenistan", "value": "TM" },
                { "text": "Turks and Caicos Islands", "value": "TC" },
                { "text": "Tuvalu", "value": "TV" },
                { "text": "Uganda", "value": "UG" },
                { "text": "Ukraine", "value": "UA" },
                { "text": "United Arab Emirates", "value": "AE" },
                { "text": "United Kingdom", "value": "GB" },
                { "text": "United States", "value": "US", synonym: ['USA','United States of America'] },
                { "text": "United States Minor Outlying Islands", "value": "UM" },
                { "text": "Uruguay", "value": "UY" },
                { "text": "Uzbekistan", "value": "UZ" },
                { "text": "Vanuatu", "value": "VU" },
                { "text": "Venezuela", "value": "VE" },
                { "text": "Viet Nam", "value": "VN" },
                { "text": "Virgin Islands, British", "value": "VG" },
                { "text": "Virgin Islands, U.S.", "value": "VI" },
                { "text": "Wallis and Futuna", "value": "WF" },
                { "text": "Western Sahara", "value": "EH" },
                { "text": "Yemen", "value": "YE" },
                { "text": "Zambia", "value": "ZM" },
                { "text": "Zimbabwe", "value": "ZW" }
            ];
             
            for (var i = 0; i < countries.length; i++) {
                countries[i].image = 'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/' + countries[i].value.toLowerCase() + '.svg';
            }

            // Owner
            jSuites.dropdown(document.getElementById('owner-dropdown'), {
                data: countries,
                autocomplete: true,
                multiple: false,
                width: '100%',
            });
            var ownerDropdown = document.querySelector("#owner-dropdown input");
            ownerDropdown.setAttribute('name', 'owner_country');

            // Breeder
            jSuites.dropdown(document.getElementById('breeder-dropdown'), {
                data: countries,
                autocomplete: true,
                multiple: false,
                width: '100%',
            });
            var breederDropdown = document.querySelector("#breeder-dropdown input");
            breederDropdown.setAttribute('name', 'breeder_country');

            // Datepicker
            $('.datepicker').datepicker({
                language: "en",
                autoclose: true,
                format: "dd/mm/yyyy"
              });

        })

</script>

<?php
get_footer();
