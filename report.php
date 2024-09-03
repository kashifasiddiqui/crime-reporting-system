<?php

include 'php/includes/header.php';
if (!isset($_SESSION['email'])) {
  Header('Location:logout.php');
}
?>
<div class="container" id="wrapper">
    <div id="header">
        <div class="mainLogo">
            <div class="logo"><img src="assets/images/lgnew.png" width="170px" height="70px" /> </div>
        </div>
        <div id="login">
            <?php if (isset($_SESSION['email'])) { ?>
                
            <?php } else { ?>
                <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php } ?>  
    </div>
  </div>
  <style>
                    .leftSidebar {
                        padding: 20px;
                        background-color: #f8f9fa;
                        border-radius: 8px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    }

                    .sidebar-section {
                        margin-bottom: 20px;
                        width:250px;
                    }

                    .section-title {
                        font-size: 18px;
                        font-weight: bold;
                        color: #990000;
                        margin-bottom: 15px;
                        border-bottom: 3px solid #990000;
                        padding-bottom: 10px;
                        position: relative;
                    }

                    .section-title::after {
                        content: '';
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        width: 50px;
                        height: 3px;
                        background-color: #990000;
                    }

                    .section-content {
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                    }

                    .report-sidebar-card {
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 12px;
                        padding: 15px;
                        display: flex;
                        align-items: center;
                        gap: 15px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s, box-shadow 0.3s;
                        position: relative;
                    }

                    .report-sidebar-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
                    }

                    .report-report-sidebar-card-content {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }

                    .report-report-sidebar-card-icon-container {
                        width: 40px;
                        height: 40px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                        padding: 5px;
                        transition: background 0.3s;
                    }

                    .card-icon {
                        width: 24px;
                        height: 24px;
                        transition: filter 0.3s;
                    }

                    .report-sidebar-title {
                        font-size: 16px;
                        color: #b30000;
                        text-decoration: none;
                        font-weight: bold;
                        transition: color 0.3s;
                    }

                    .report-sidebar-title:hover {
                        color: #b30000;
                        text-decoration: none;
                    }

                    .report-sidebar-card:hover .report-report-sidebar-card-icon-container {
                        background: linear-gradient(135deg, #b30000, #b30000);
                    }

                    .report-sidebar-card:hover .card-icon {
                        filter: brightness(0.8);
                    }
                    .submenu {
                        display: none;
                        margin-top: 10px;
                        padding-left: 20px;
                        border-left: 2px solid #ddd;
                    }

                    /* Submenu Item Styling */
                    .submenu-item {
                        display: block;
                        padding: 5px 0;
                        text-decoration: none;
                        color: #333; /* Matches the main card title color */
                        font-size: 14px; /* Adjust as needed */
                        transition: color 0.3s;
                    }

                    /* Hover Effects for Submenu Items */
                    .submenu-item:hover {
                        text-decoration: none;
                        color: #b30000; /* Matches the main card title color */
                    }

                    /* Add some padding to left to align submenu with the main menu */
                    #crime-submenu {
                        padding-left: 20px; /* Adjust padding if needed */
                    }
  </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function toggleSubmenu(toggleId, submenuId) {
            var toggleButton = document.getElementById(toggleId);
            var submenu = document.getElementById(submenuId);

            toggleButton.addEventListener('click', function (event) {
                event.preventDefault(); 
                if (submenu.style.display === 'none' || submenu.style.display === '') {
                    submenu.style.display = 'block';
                } else {
                    submenu.style.display = 'none';
                }
            });
        }

        // Initialize toggles
        toggleSubmenu('missing-found-toggle', 'missing-found-submenu');
        toggleSubmenu('vehicle-toggle', 'vehicle-submenu');
    });
</script>
  <div id="nav">
    <?php include 'php/includes/navigation.php' ?>
  </div>
  <div id="main">
    <div class="row">
    <div class="col-md-3">
    <div class="sidebar-section">
                        <h3 class="section-title">Crime Report Form</h3>
                        <div class="section-content">
                            <div class="report-sidebar-card" id="r_crime">
                                <div class="report-report-sidebar-card-content">
                                    <div class="report-report-sidebar-card-icon-container">
                                        <img src="assets/images/police.svg" alt="Police_Number" class="card-icon"/>
                                    </div>
                                    <a href="#" class="report-sidebar-title">General Crime Form </a>
                                </div>
                            </div>

                            <div class="report-sidebar-card">
    <div class="report-report-sidebar-card-content">
        <div class="report-report-sidebar-card-icon-container">
            <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
        </div>
        <a href="#" class="report-sidebar-title" id="missing-found-toggle">Missing/Found Persons</a>
        <div class="submenu" id="missing-found-submenu">
            <div class="report-report-sidebar-card-icon-container">
                <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
            </div>
            <a href="#" class="submenu-item" id="person_missing">Missing Person Form</a>
            <div class="report-report-sidebar-card-icon-container">
                <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
            </div>
            <a href="#" class="submenu-item" id="person_found">Person Found Form</a>
        </div>
    </div>
</div>

<div class="report-sidebar-card">
    <div class="report-report-sidebar-card-content">
        <div class="report-report-sidebar-card-icon-container">
            <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
        </div>
        <a href="#" class="report-sidebar-title" id="vehicle-toggle">Missing/Found Vehicles</a>
        <div class="submenu" id="vehicle-submenu">
            <div class="report-report-sidebar-card-icon-container">
                <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
            </div>
            <a href="#" class="submenu-item" id="vehicle_missing">Missing Vehicle Form</a>
            <div class="report-report-sidebar-card-icon-container">
                <img src="assets/images/ambulance.svg" alt="Ambulance_Number" class="card-icon"/>
            </div>
            <a href="#" class="submenu-item" id="vehicle_found">Vehicle Found Form</a>
        </div>
    </div>
</div>
                            <div class="report-sidebar-card" id="lost-found">
                                <div class="report-report-sidebar-card-content">
                                    <div class="report-report-sidebar-card-icon-container">
                                        <img src="assets/images/Fire_brigade.svg" alt="Fire_Brigade_Number" class="card-icon"/>
                                    </div>
                                    <a href="#" class="report-sidebar-title">Lost Items</a>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

      <div class="col-sm-9">
        <div class="col-lg-12">
          <div class="well" id="item_display">

            <form class="bs-example form-horizontal" method="post" action="" id="items" class="forms">
              <fieldset>
                <legend>Report Lost/Found Item:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="item_name" class="col-lg-4 control-label">Item Name</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="item_name" name="item_name" placeholder="Item Name" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="category" class="col-lg-4 control-label">Category</label>
                        <div class="col-lg-8">
                          <select class="form-control" id="category" name="category" title="Please select Category!" required>
                            <option value="">-- select --</option>
                            <option value="Lost">Lost</option>
                            <option value="found">Found</option>
                          </select>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="last_seen" class="col-lg-4 control-label">Last Seen</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="last_seen" title="Date required" name="last_seen" type="date" required />

                        </div>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="form-group">
                        <label for="item_description" class="col-lg-2 control-label">Item Description:</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="item_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="lost_found" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="m_person_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_person_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Person:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td valign="top" width="50%">
                      <div class="form-group">
                        <label for="full_names" class="col-lg-4 control-label">Full Names</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="full_names" name="full_names" placeholder="Full Names" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address" class="col-lg-4 control-label">Address</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="address" name="address" placeholder="Address" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_number" class="col-lg-4 control-label">Phone Number</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="phone_number" title="" name="phone_number" type="number" required />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="last_seen2" class="col-lg-4 control-label">Last Seen</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="last_seen2" title="Date required" name="last_seen2" type="date" required />

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input title="Date required" name="missing_image" type="file" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="item_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="missing_person" class="btn btn-primary pull-right" id="missing_person" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="p_found_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="p_found_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Person Found:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="full_names1" class="col-lg-4 control-label">Full Names</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="full_names1" name="full_names1" placeholder="Full Names" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="location_seen" class="col-lg-4 control-label">Location Seen</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="location_seen" name="location_seen" placeholder="Location Seen" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_number" class="col-lg-4 control-label">Your Phone Number</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="phone_number" name="phone_number" type="number" required />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="image" class="col-lg-4 control-label">Upload Image:</label>
                        <div class="col-lg-6">
                          <input id="image" title="Date required" name="found_image" type="file" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="person_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="missing_person_found" name="missing_person_found" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="m_vehicle_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_vehicle_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Vehicle:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="number_plate" class="col-lg-3 control-label">Number Plate</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="number_plate" name="number_plate" placeholder="Number Plate" type="text" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="model" class="col-lg-3 control-label">Model</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="model" name="model" placeholder="Model" type="text" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="owner_names" class="col-lg-3 control-label">Owner</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="owner_names" name="owner_names" type="text" placeholder="Owner" required />
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="phone_number1" class="col-lg-3 control-label">Phone Number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="phone_number1" name="phone_number1" type="number" required placeholder="Phone" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="id_number" class="col-lg-3 control-label">ID number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="id_number" name="id_number_o" type="number" required placeholder="ID number" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image1" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input id="missing_vehicle_image" name="missing_vehicle_image" type="file" required />
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="vehicle_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="vehicle_description" min="5" required name="vehicle_description"></textarea>

                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button type="submit" name="m_vehicle_submit" class="btn btn-primary pull-right" id="m_vehicle_submit" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="f_vehicle_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="f_vehicle_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Stollen Vehicle Found/Seen:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="number_plate" class="col-lg-3 control-label">Number Plate</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="number_plate2" name="number_plate2" placeholder="Number Plate" type="text" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="model" class="col-lg-3 control-label">Model</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="model2" name="model2" placeholder="Model" type="text" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="owner_names" class="col-lg-3 control-label">Location Seen</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="location_seen" name="location_seen" type="date" required placeholder="Location Seen" />
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="phone_number1" class="col-lg-3 control-label">Your Phone Number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="phone_number2" name="phone_number2" type="date" required placeholder="Phone Number" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="id_number" class="col-lg-3 control-label">ID number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="id_number2" name="id_number2" type="date" required placeholder="National ID" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image1" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input id="f_vehicle_image" name="f_vehicle_image" type="file" required />
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="vehicle_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="vehicle_description2" min="5" required name="vehicle_description2"></textarea>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button type="submit" class="btn btn-primary pull-right" name="f_vehicle_submit" id="found_vehicle" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-13">
          <div class="well" id="report_crime_display">
            <form class="bs-example form-horizontal" method="post" action="" id="report_crime">

              <fieldset>
                <legend>General Crime Reporting Form:</legend>
                <div id="crime2"></div>
                <table>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="crime_type" class="col-lg-4  control-label">Crime type:</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="crime_type" placeholder="Crime Type" type="text" required name="crime_type">
                        </div>
                      </div>
                      <h3>Specify Location</h3>
                      <div class="form-group">
                        <label for="State" class="col-lg-4 control-label">State</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="State" placeholder="State" type="text" required name="State">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="category" class="col-lg-4 control-label">Sub-County</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="sub_county" placeholder="Sub County" type="text" required name="sub_county">
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="street" class="col-lg-5 control-label">Street</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="street" placeholder="Street" type="text" required name="street">
                          <span class="help-block">eg: along Ziwa Kitale road</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="crime_description" class="col-lg-5 control-label">Crime Description:</label>
                        <div class="col-lg-7">
                          <textarea class="form-control" rows="4" id="crime_description" required name="crime_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="report_c" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report Crime</button>
                  </div>
                  <div class="form-check">
                <input class="form-check-input" type="checkbox" id="anonymous" name="anonymous">
                <label class="form-check-label" for="anonymous">Post anonymously</label>
            </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="clearer" style="height:3px;"></div>
  <?php include 'php/includes/footer.php'; ?>