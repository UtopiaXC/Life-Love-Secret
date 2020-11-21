<?php
require_once "api/standard_display_api.php";
require_once "api/sql_api.php";
$conn = getConn();
if ($conn->connect_error) {
    header('Location: ../error_pages/DatabaseErrorPage.html');
    exit;
}
$result = $conn->query("SELECT * FROM web_message");
$Title = "";
while ($row = $result->fetch_assoc()) {
    if ($row['Title'] == "网站标题") {
        $Title = $row['Content'];
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title><?php echo $Title?> - 后台</title>
    <?php showDefaultHead(); ?>
    <style>
        body {
            background: #f2f2f2;
            color: #333;
        }
    </style>

</head>


<body>

<div class="wrapper">
    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>

    <section class="user-account">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget video_info pr sp">
								<span class="vc_hd">
									<img src="../images/resources/sn.png" alt="">
								</span>
                            <h4>ScereBro</h4>
                            <p>since: Dec 17, 2017 </p>
                            <span>Last Login: 42 minutes ago</span>
                        </div><!--video_info pr-->
                        <div class="widget account">
                            <h2 class="hd-uc"> <i class="icon-user"></i> Account</h2>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Blocked Users</a></li>
                                <li><a href="#"> Change Password</a></li>
                                <li><a href="#">Change Email</a></li>
                                <li><a href="#">Manage Subscriptions </a></li>
                                <li><a href="#">Contacts Manager </a></li>
                            </ul>
                        </div><!--account end-->
                        <div class="widget notifications">
                            <h2 class="hd-uc"><i class="icon-notification"></i>Notifications</h2>
                            <a href="#" title="">Manage Notifications</a>
                        </div><!--notifications end-->
                        <div class="widget donation">
                            <h2 class="hd-uc"><i class="icon-donations"></i>Donations </h2>
                            <ul>
                                <li><a href="#">Manage Donations </a></li>
                                <li><a href="#">Add Credit</a></li>
                            </ul>
                        </div><!--donation end-->
                        <div class="widget chanel-pro">
                            <h2 class="hd-uc"><i class="icon-preferences"></i>Channel and Profile  </h2>
                            <ul>
                                <li><a href="#"> Account Settings</a></li>
                                <li><a href="#"> Profile Settings </a></li>
                                <li><a href="#"> Change Avatar</a></li>
                            </ul>
                        </div><!--chanel-pro end-->
                        <div class="widget vid-ac">
                            <h2 class="hd-uc"><i class="icon-play"></i>Videos </h2>
                            <ul>
                                <li><a href="#">Uploaded Videos </a></li>
                                <li><a href="#"> Favorite Videos </a></li>
                            </ul>
                        </div><!--vid-ac end-->
                        <div class="widget playlist">
                            <h2 class="hd-uc"><i class="icon-add_to_playlist"></i>Playlists  </h2>
                            <span><a href="#"> Manage Playlists</a></span>
                        </div><!--playlist end-->
                        <div class="widget messages">
                            <h2 class="hd-uc"><i class="icon-message"></i> Messages</h2>
                            <ul>
                                <li><a href="#">New Message</a></li>
                                <li><a href="#"> Inbox (10)</a></li>
                                <li><a href="#"> Sent</a></li>
                            </ul>
                        </div><!--messages end-->
                        <div class="widget contacts">
                            <h2 class="hd-uc"><i class="icon-group"></i>Contacts</h2>
                            <ul>
                                <li><a href="#" title=""> Manage Contacts</a></li>
                                <li><a href="#" title="">Add Contact </a></li>
                            </ul>
                        </div><!-- Contacts  end-->
                    </div><!--sidebar end-->
                </div>
                <div class="col-lg-9">
                    <div class="video-details">
                        <div class="latest_vidz">
                            <div class="latest-vid-option">
                                <h2 class="hd-op"> Latest Videos</h2>
                                <a href="#" title="" class="op-1">Video Details</a>
                                <a href="#" title="" class="op-2"> Options</a>
                                <div class="clearfix"></div>
                            </div><!--latest-vid-option end-->
                            <div class="vidz_list">
                                <div class="tb-pr">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
                                            <div class="tab-history acct_page">
                                                <div class="videoo">
                                                    <div class="vid_thumbainl ms br">
                                                        <a href="single_video_page.html" title="">
                                                            <img src="../images/resources/vide1.png" alt="">
                                                            <span class="vid-time">30:32</span>
                                                            <span class="watch_later">
																	<i class="icon-watch_later_fill"></i>
																</span>
                                                        </a>
                                                    </div><!--vid_thumbnail end-->
                                                    <div class="video_info ms br">
                                                        <h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails Compilation</a></h3>
                                                        <h4><a href="Single_Channel_Home.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                                        <span>686K views . 1 week ago</span>
                                                        <ul>
                                                            <li><span class="br-1">Inactive</span></li>
                                                            <li><span class="br-2">Successful</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div><!--videoo end-->
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                                            <div class="icon-list">
                                                <ul>
                                                    <li><a href="#" title=""><i class="icon-play"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-pencil"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-cancel"></i></a></li>
                                                </ul>
                                            </div><!--icon-list end-->
                                        </div>
                                    </div>
                                </div><!--tb-pr end-->
                                <div class="tb-pr">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
                                            <div class="tab-history acct_page">
                                                <div class="videoo">
                                                    <div class="vid_thumbainl ms br">
                                                        <a href="single_video_page.html" title="">
                                                            <img src="../images/resources/vide2.png" alt="">
                                                            <span class="vid-time">30:32</span>
                                                            <span class="watch_later">
																	<i class="icon-watch_later_fill"></i>
																</span>
                                                        </a>
                                                    </div><!--vid_thumbnail end-->
                                                    <div class="video_info ms br">
                                                        <h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
                                                        <h4><a href="Single_Channel_Home.html" title="">Eros Now</a></h4>
                                                        <span>283K views . 3 months ago</span>
                                                        <ul>
                                                            <li><span class="br-1">Inactive</span></li>
                                                            <li><span class="br-2">Successful</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div><!--videoo end-->
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                                            <div class="icon-list">
                                                <ul>
                                                    <li><a href="#" title=""><i class="icon-play"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-pencil"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-cancel"></i></a></li>
                                                </ul>
                                            </div><!--icon-list end-->
                                        </div>
                                    </div>
                                </div><!--tb-pr end-->
                                <div class="tb-pr">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
                                            <div class="tab-history acct_page">
                                                <div class="videoo">
                                                    <div class="vid_thumbainl ms br">
                                                        <a href="single_video_page.html" title="">
                                                            <img src="../images/resources/vide3.png" alt="">
                                                            <span class="vid-time">30:32</span>
                                                            <span class="watch_later">
																	<i class="icon-watch_later_fill"></i>
																</span>
                                                        </a>
                                                    </div><!--vid_thumbnail end-->
                                                    <div class="video_info ms br">
                                                        <h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
                                                        <h4><a href="Single_Channel_Home.html" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                                        <span>2.6M views . 2 months ago</span>
                                                        <ul>
                                                            <li><span class="br-3">Active</span></li>
                                                            <li><span class="br-2">Successful</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div><!--videoo end-->
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                                            <div class="icon-list">
                                                <ul>
                                                    <li><a href="#" title=""><i class="icon-play"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-pencil"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-cancel"></i></a></li>
                                                </ul>
                                            </div><!--icon-list end-->
                                        </div>
                                    </div>
                                </div><!--tb-pr end-->
                            </div><!--vidz_list end-->
                        </div><!--latest_vidz end-->
                        <div class="blocked-users">
                            <h2 class="hd-op">  Blocked Users </h2>
                            <form>
                                <input type="text" placeholder=" Separate usernames by comma">
                                <button type="submit"> Update</button>
                            </form>
                            <ul class="optz_list">
                                <li><a href="#" title="">User</a></li>
                                <li><a href="#" title="">Options</a></li>
                            </ul><!--optz_list end-->
                            <div class="clearfix"></div>
                        </div><!--Blocked Users end-->
                        <div class="blocked-pr">
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
										<span class="vc_hd">
											<img src="../images/resources/sn.png" alt="">
										</span>
                                    <div class="vc_info st">
                                        <h4><a href="#" title="">ScereBro</a></h4>
                                        <span>Blocked on Oct 22, 2017</span>
                                    </div>
                                </div><!--vcp_inf end-->
                                <a href="#" title="" class="play_ms">
                                    <i class="icon-blocked"></i>
                                </a>
                            </div><!--blocked-vcp-->
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
										<span class="vc_hd">
											<img src="../images/resources/th1.png" alt="">
										</span>
                                    <div class="vc_info st">
                                        <h4><a href="#" title="">Doge</a></h4>
                                        <span>Blocked 20 hours ago</span>
                                    </div>
                                </div><!--vcp_inf end-->
                                <a href="#" title="" class="play_ms">
                                    <i class="icon-blocked"></i>
                                </a>
                            </div><!--blocked-vcp-->
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
										<span class="vc_hd">
											<img src="../images/resources/th3.png" alt="">
										</span>
                                    <div class="vc_info st">
                                        <h4><a href="#" title="">Menji</a></h4>
                                        <span>Blocked 1 week ago</span>
                                    </div>
                                </div><!--vcp_inf end-->
                                <a href="#" title="" class="play_ms">
                                    <i class="icon-blocked"></i>
                                </a>
                            </div><!--blocked-vcp-->
                        </div><!--blocked-pr end-->
                        <div class="change-pswd">
                            <h2 class="hd-op">Change password</h2>
                            <form>
                                <div class="ch-pswd">
                                    <input type="password" name="old_password" placeholder="Old Password">
                                </div><!--ch-pswd end-->
                                <div class="ch-pswd">
                                    <input type="password" name="new_password" placeholder=" New Password">
                                </div><!--ch-pswd end-->
                                <div class="ch-pswd">
                                    <input type="password" name="confirm_password" placeholder="Confirm New Password">
                                </div><!--ch-pswd end-->
                                <div class="ch-pswd">
                                    <button type="submit"> Update</button>
                                </div><!--ch-pswd end-->
                            </form>
                        </div><!--change-pswd end-->
                        <div class="blocked-pr mange_sub">
                            <div class="manage-sub">
                                <h2 class="hd-op"> Manage Subscriptions </h2>
                                <ul class="optz_list">
                                    <li><a href="#" title="">User</a></li>
                                    <li><a href="#" title="">Options</a></li>
                                </ul><!--optz_list end-->
                                <div class="clearfix"></div>
                            </div><!--Manage-Sub end-->
                            <div class="blckd_list">
                                <div class="blocked-vcp">
                                    <div class="vcp_inf">
											<span class="vc_hd">
												<img src="../images/resources/th4.png" alt="">
											</span>
                                        <div class="vc_info st">
                                            <h4><a href="#" title="">ScereBro</a></h4>
                                            <span>Subscribed 3 months ago</span>
                                        </div>
                                    </div><!--vcp_inf end-->
                                    <span class="active-mb pr"> Active</span>
                                    <a href="#" title="" class="play_ms">
                                        Action
                                        <i class="icon-arrow_below"></i>
                                    </a>
                                    <div class="clearfix"></div>
                                </div><!--blocked-vcp-->
                                <div class="blocked-vcp">
                                    <div class="vcp_inf">
											<span class="vc_hd">
												<img src="../images/resources/th5.png" alt="">
											</span>
                                        <div class="vc_info st">
                                            <h4><a href="#" title="">Doge</a></h4>
                                            <span>Subscribed 16 months ago</span>
                                        </div>
                                    </div><!--vcp_inf end-->
                                    <a href="#" title="" class="play_ms">
                                        Action
                                        <i class="icon-arrow_below"></i>
                                    </a>
                                    <span class="active-mb sr"> Inactive</span>
                                    <div class="clearfix"></div>
                                </div><!--blocked-vcp-->
                                <div class="blocked-vcp">
                                    <div class="vcp_inf">
											<span class="vc_hd">
												<img src="../images/resources/th3.png" alt="">
											</span>
                                        <div class="vc_info st">
                                            <h4><a href="#" title="">Menji</a></h4>
                                            <span>Subscribed 2 years ago</span>
                                        </div>
                                    </div><!--vcp_inf end-->
                                    <a href="#" title="" class="play_ms">
                                        Action
                                        <i class="icon-arrow_below"></i>
                                    </a>
                                    <span class="active-mb mr">  Paused</span>
                                    <div class="clearfix"></div>
                                </div><!--blocked-vcp-->
                            </div>
                        </div><!--blocked-pr end-->
                        <div class="account-details">
                            <div class="account_details_content">
                                <h2 class="hd-op">  Account Details </h2>
                                <h4 class="slct-hd">Country</h4>
                                <div class="slct_optz">
                                    <select>
                                        <option>United States</option>
                                        <option>United States</option>
                                        <option>United States</option>
                                        <option>United States</option>
                                    </select>
                                    <a href="#" title="" class="arw_vz">
                                        <i class="icon-arrow_below"></i>
                                    </a>
                                </div>
                                <h4 class="slct-hd"> Gender</h4>
                                <ul class="gend">
                                    <li>
                                        <div class="chekbox-lg">
                                            <label>
                                                <input type="radio" name="gender" value="male">
                                                <b class="checkmark"></b>
                                                <span>Male</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chekbox-lg">
                                            <label>
                                                <input type="radio" name="gender" value="female">
                                                <b class="checkmark"> </b>
                                                <span>Female</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <h4 class="slct-hd">Account Details </h4>
                                <div class="slct_optz">
                                    <select>
                                        <option> ABGC</option>
                                        <option> ABGC</option>
                                        <option> ABGC</option>
                                        <option> ABGC</option>
                                    </select>
                                    <a href="#" title="" class="arw_vz">
                                        <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9394 7.51447L22.0607 9.63579L12 19.6964L1.93936 9.63579L4.06068 7.51447L12 15.4538L19.9394 7.51447Z" fill="#9494A0"></path>
                                        </svg>
                                    </a>
                                </div>
                                <h4 class="slct-hd">Date of Birth </h4>
                                <div class="dob flatpickr">
                                    <input type="number" name="date" class="flatpickr-input" placeholder="Select Date..." data-input>
                                    <a href="#" title="" class="arw_vz">
                                        <i class="icon-arrow_below"></i>
                                    </a>
                                </div>
                                <div class="ch-pswd">
                                    <button type="submit"> Update</button>
                                </div><!--ch-pswd end-->
                            </div><!--account_details_content end-->
                            <div class="clearfix"></div>
                        </div><!--Account Details end-->
                    </div><!--video-details end-->
                </div>
            </div>
        </div>
    </section><!--user-account end-->
    <?php showFooter($conn); ?>
</div><!--wrapper end-->
<?php showDefaultScript(); ?>
</body>

</html>