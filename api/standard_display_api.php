<?php
function showHeader($conn)
{
    echo "<header>
        <div class='top_bar'>
            <div class='container'>
                <div class='top_header_content'>
                    <div class='menu_logo'>
                        <a href='#' title='' class='menu'>
    <i class='icon-menu'></i>
                        </a>
                    </div><!--menu_logo end-->
                    <div class='search_form'>
                        <form method='get' action='../search.php'>
                            <label for='search' style='display: none'></label>
                            <input type='text' id='search' name='search' placeholder='搜索内容'>
                            <button type='submit'><i class='icon-search'></i></button>
                        </form>
                    </div><!--search_form end-->
                    <ul class='controls-lv'>
                        <li>
                            <a href='#' title=''><i class='icon-message'></i></a>
                        </li>
                        <li>
                            <a href='#' title=''><i class='icon-notification'></i></a>
                        </li>
                        <li class='user-log'>";

                        if (@$_COOKIE['TokenID']) {
                            echo "
                            <div class='user-ac-img'>
                                <img class='avatar' src='../sources/avatar/user-img.jpg' alt=''>
                            </div>
                            <div class='account-menu'>
                                <h4>UtopiaXC <span class='usr-status'>管理员</span></h4>
                                <div class='sd_menu'>
                                    <ul class='mm_menu'>
                                        <li>
												<span>
													<i class='icon-user'></i>
												</span>
                                            <a href='../center.php' title=''>个人中心</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-settings'></i>
												</span>
                                            <a href='../account.php' title=''>账户设置</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-logout'></i>
												</span>
                                            <a onclick='logout();' title=''>退出登录</a>
                                        </li>
                                    </ul>
                                </div><!--sd_menu end-->
                                <div class='sd_menu scnd'>
                                    <ul class='mm_menu'>
                                        <li>
												<span>
													<i class='icon-light'></i>
												</span>
                                            <a href='#' title=''>夜间（开发中）</a>
                                            <label class='switch'>
                                                <input type='checkbox'>
                                                <b class='slider round'></b>
                                            </label>
                                        </li>
                                        <li>
												<span>
													<i class='icon-feedback'></i>
												</span>
                                            <a href='../feedback.php' title=''>反馈</a>
                                        </li>
                                    </ul>
                                </div><!--sd_menu end-->
                                <div class='restricted-mode'>
                                    <h4>隐匿模式</h4>
                                    <label class='switch'>
                                        <input type='checkbox' checked>
                                        <span class='slider round'></span>
                                    </label>
                                    <div class='clearfix'></div>
                                </div><!--restricted-more end-->
                            </div>";
                        }
                        else{
                            echo "
                            <div class='user-ac-img'>
                                <img class='avatar' src='../sources/avatar/user-unlogin.png' alt='User Avatar'>
                            </div>
                            <div class='account-menu'>
                                <h4>当前未登录</h4>
                                <div class='sd_menu'>
                                    <ul class='mm_menu'>
                                        <li>
												<span>
													<i class='icon-user'></i>
												</span>
                                            <a href='../login.php' title=''>登录</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-flag'></i>
												</span>
                                            <a href='../signup.php' title=''>注册</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-cancel'></i>
												</span>
                                            <a href='../find_password.php' title=''>找回密码</a>
                                        </li>
                                    </ul>
                                </div><!--sd_menu end-->
                            </div>";
                        }
                        echo "
                        </li>
                    </ul><!--controls-lv end-->
                    <div class='clearfix'></div>
                </div><!--top_header_content end-->
            </div>
        </div><!--header_content end-->
        <div class='btm_bar'>
            <div class='container'>
                <div class='btm_bar_content'>
                    <nav>
                        <ul>
                            <li><a href='/' title=''>主页</a></li>
                            <li><a href='../confessions.php' title=''>表白墙</a></li>
                            <li><a href='../secrets.php' title=''>树洞</a></li>
                            <li><a href='../founds.php' title=''>失物招领</a></li>
                            <li><a href='../transactions.php' title=''>校内交易</a></li>
                            <li><a href='../announcements.php' title=''>公告</a></li>
                            <li><a href='../center.php' title=''>个人中心</a></li>
                        </ul>
                    </nav><!--navigation end-->
                    <div class='clearfix'></div>
                </div><!--btm_bar_content end-->
            </div>
        </div><!--btm_bar end-->
    </header><!--header end-->";
}

function showMenu($conn)
{
    $result = $conn->query("SELECT * FROM web_message");
    $Service = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title'] == "运营方") {
            $Service = $row['Content'];
        }
    }
    if (@$_COOKIE['TokenID'])
        echo "
        <div class='side_menu'>
        <div class='sd_menu'>
            <h3>我的</h3>
            <ul class='mm_menu'>
                <li>
						<span>
							<i class='icon-watch_later'></i>
						</span>
                    <a href='../center.php?action=timeline' title=''>时间线</a>
    </li>
                <li>
						<span>
							<i class='icon-like'></i>
						</span>
                    <a href='../center.php?action=recommend' title=''>已赞</a>
                </li>
                <li>
						<span>
							<i class='icon-play_list'></i>
						</span>
                    <a href='../center.php?action=subscription' title=''>关注列表</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class='sd_menu'>
            <ul class='mm_menu'>
                <li>
						<span>
							<i class='icon-settings'></i>
						</span>
                    <a href='../account.php' title=''>账户设置</a>
                </li>
                <li>
						<span>
							<i class='icon-flag'></i>
						</span>
                    <a href='../messages.php' title=''>消息中心</a>
                </li>
                <li>
						<span>
							<i class='icon-logout'></i>
						</span>
                    <a onclick='logout();' title=''>注销登录</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class='sd_menu m_linkz'>
            <ul class='mm_menu'>
                <li><a href='../about.php'>关于</a></li>
                <li><a href='../rules.php'>社区规则</a></li>
                <li><a href='../privacy.php'>隐私权</a></li>
                <li><a target='_blank' href='https://www.github.com/UtopiaXC/Life-Love-Secret/'>Github</a></li>
                <li><a href='../faq.php'>FAQ</a></li>
            </ul>
            <span>$Service</span>
        </div><!--sd_menu end-->
        <div class='dd_menu'></div>
    </div><!--side_menu end-->
        ";
    else
    echo "
        <div class='side_menu'>
        <div class='sd_menu'>
        <h3>账户</h3>
            <ul class='mm_menu'>
                <li>
						<span>
							<i class='icon-user'></i>
						</span>
                    <a href='../login.php' title=''>登录</a>
    </li>
                <li>
						<span>
							<i class='icon-flag'></i>
						</span>
                    <a href='../signup.php' title=''>注册</a>
                </li>
                <li>
						<span>
							<i class='icon-cancel'></i>
						</span>
                    <a href='../find_password.php' title=''>找回密码</a>
                </li>
            </ul>
        </div>
        <div class='sd_menu m_linkz'>
            <ul class='mm_menu'>
                <li><a href='../about.php'>关于</a></li>
                <li><a href='../rules.php'>社区规则</a></li>
                <li><a href='../privacy.php'>隐私权</a></li>
                <li><a target='_blank' href='https://www.github.com/UtopiaXC/Life-Love-Secret/'>Github</a></li>
                <li><a href='../faq.php'>FAQ</a></li>
            </ul>
            <span>$Service</span>
        </div><!--sd_menu end-->
        <div class='dd_menu'></div>
    </div><!--side_menu end-->";
}

function showFooter($conn)
{
    $result = $conn->query("SELECT * FROM web_message");
    $Service = "";
    $footer = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title'] == "运营方") {
            $Service = $row['Content'];
        }
        if ($row['Title'] == "页脚") {
            $footer = $row['Content'];
        }
    }
    echo "<footer>
        <section class='more_items_sec text-center'>
            <div class='container'>
                <p style='color: #7f7f7f'>Powered By <a target='_blank' href='https://github.com/UtopiaXC/Life-Love-Secret'>Life&Love&Secret</a> | $Service
                    <br>$footer</p>
            </div>
        </section><!--more_items_sec end-->
    </footer>";
}

function showDefaultHead()
{
    echo "<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='../sources/logo/balloons.png'>
    <link rel='stylesheet' type='text/css' href='../css/animate.css'>
    <link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='../css/flatpickr.min.css'>
    <link rel='stylesheet' type='text/css' href='../css/fontello.css'>
    <link rel='stylesheet' type='text/css' href='../css/fontello-codes.css'>
    <link rel='stylesheet' type='text/css' href='../css/thumbs-embedded.css'>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' href='../css/responsive.css'>
    <link rel='stylesheet' type='text/css' href='../css/color.css'>
    <link href='../css/sweetalert.min.css' rel='stylesheet'>
    <script src='../js/sweetalert.js'></script>
    <script src='../js/vue.js'></script>";
}

function showDefaultScript()
{
    echo "
    <script src='../js/jquery.min.js'></script>
    <script src='../js/popper.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script src='../js/flatpickr.js'></script>
    <script src='../js/script.js'></script>";
}