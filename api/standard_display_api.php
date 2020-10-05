<?php

function showHeader()
{
    echo "<header>
        <div class='top_bar'>
            <div class='container'>
                <div class='top_header_content'>
                    <div class='menu_logo'>
                        <a href='#' title='' class='menu'>
    <i class='icon-menu'></i>
                        </a>
                        <a href='../index.php' title='' class='logo'>
                            <h1>Life&Love&Secret</h1>
                        </a>
                    </div><!--menu_logo end-->
                    <div class='search_form'>
                        <form>
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
                        <li class='user-log'>
                            <div class='user-ac-img'>
                                <img class='avatar' src='../images/resources/user-img.jpg' alt=''>
                            </div>
                            <div class='account-menu'>
                                <h4>UtopiaXC <span class='usr-status'>管理员</span></h4>
                                <div class='sd_menu'>
                                    <ul class='mm_menu'>
                                        <li>
												<span>
													<i class='icon-user'></i>
												</span>
                                            <a href='#' title=''>个人中心</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-settings'></i>
												</span>
                                            <a href='#' title=''>账户设置</a>
                                        </li>
                                        <li>
												<span>
													<i class='icon-logout'></i>
												</span>
                                            <a href='#' title=''>退出登录</a>
                                        </li>
                                    </ul>
                                </div><!--sd_menu end-->
                                <div class='sd_menu scnd'>
                                    <ul class='mm_menu'>
                                        <li>
												<span>
													<i class='icon-light'></i>
												</span>
                                            <a href='#' title=''>黑暗模式</a>
                                            <label class='switch'>
                                                <input type='checkbox'>
                                                <b class='slider round'></b>
                                            </label>
                                        </li>
                                        <li>
												<span>
													<i class='icon-feedback'></i>
												</span>
                                            <a href='#' title=''>反馈</a>
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
                            </div>
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
                            <li><a href='../参考/Browse_Categories.html' title=''>表白墙</a></li>
                            <li><a href='../参考/Browse_Channels.html' title=''>树洞</a></li>
                            <li><a href='#' title=''>失物招领</a></li>
                            <li><a href='#' title=''>校内交易</a></li>
                            <li><a href='../参考/Single_Channel_Home.html' title=''>公告</a></li>
                            <li><a href='#' title=''>个人中心</a></li>
                        </ul>
                    </nav><!--navigation end-->
                    <div class='clearfix'></div>
                </div><!--btm_bar_content end-->
            </div>
        </div><!--btm_bar end-->
    </header><!--header end-->";
}

function showMenu()
{
    echo "<div class='side_menu'>
        <div class='sd_menu'>
            <h3>我的</h3>
            <ul class='mm_menu'>
                <li>
						<span>
							<i class='icon-watch_later'></i>
						</span>
                    <a href='#' title=''>时间线</a>
    </li>
                <li>
						<span>
							<i class='icon-like'></i>
						</span>
                    <a href='#' title=''>已赞</a>
                </li>
                <li>
						<span>
							<i class='icon-play_list'></i>
						</span>
                    <a href='#' title=''>关注列表</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class='sd_menu'>
            <ul class='mm_menu'>
                <li>
						<span>
							<i class='icon-settings'></i>
						</span>
                    <a href='#' title=''>账户设置</a>
                </li>
                <li>
						<span>
							<i class='icon-flag'></i>
						</span>
                    <a href='#' title=''>消息中心</a>
                </li>
                <li>
						<span>
							<i class='icon-logout'></i>
						</span>
                    <a href='#' title=''>注销登录</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class='sd_menu m_linkz'>
            <ul class='mm_menu'>
                <li><a href='#'>关于</a></li>
                <li><a href='#'>社区规则</a></li>
                <li><a href='#'>隐私权</a></li>
                <li><a href='#'>Github</a></li>
                <li><a href='#'>OJ</a></li>
                <li><a href='#'>FAQ</a></li>
            </ul>
            <span>大连民族大学ACM工作室</span>
        </div><!--sd_menu end-->
        <div class='sd_menu bb-0'>
            <ul class='social_links'>
                <li>
                    <a href='#' title=''>
                        <i class='icon-facebook-official'></i>
                    </a>
                </li>
                <li>
                    <a href='#' title=''>
                        <i class='icon-twitter'></i>
                    </a>
                </li>
                <li>
                    <a href='#' title=''>
                        <i class='icon-instagram'></i>
                    </a>
                </li>
            </ul><!--social_links end-->
        </div><!--sd_menu end-->
        <div class='dd_menu'></div>
    </div><!--side_menu end-->";
}

function showFooter()
{
    echo "<footer>
        <section class='more_items_sec text-center'>
            <div class='container'>
                <p style='color: #7f7f7f'>Powered By <a href='#'>Life&Love&Secret</a> | <a href='#'>大连民族大学ACM工作室</a>
                    <br>
                    &copy;2020 <a href='#'> UtopiaXC </a> All Rights Reserved.
                </p>
            </div>
        </section><!--more_items_sec end-->
    </footer>";
}

function showDefaultHead()
{
    echo "<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='../images/Favicon.png'>
    <link rel='stylesheet' type='text/css' href='../css/animate.css'>
    <link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='../css/flatpickr.min.css'>
    <link rel='stylesheet' type='text/css' href='../css/fontello.css'>
    <link rel='stylesheet' type='text/css' href='../css/fontello-codes.css'>
    <link rel='stylesheet' type='text/css' href='../css/thumbs-embedded.css'>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' href='../css/responsive.css'>
    <link rel='stylesheet' type='text/css' href='../css/color.css'>";
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