<?php
use yii\helpers\Url;
?>
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="https://designreset.com/cork/html/horizontal-light-menu/index.html">
                        <img src="<?=Url::to(['../../cork-style2/src/assets/img/logo.svg'])?>" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="https://designreset.com/cork/html/horizontal-light-menu/index.html" class="nav-link"> CORK </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu active">
                <a href="/" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span><?=Yii::t('app', 'Главный')?></span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
            </li>

            <li class="menu">
                <a href="index.html#apps" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span><?=Yii::t('app', 'Опираться')?></span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="apps" data-bs-parent="#accordionExample">
                    <li>
                        <a href="<?=Url::to(['/parameters/products'])?>"><?=Yii::t('app', 'Переход товары')?> </a>
                    </li>
                </ul>
            </li>


            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
            </li>

            <li class="menu">
                <a href="index.html#components" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span><?=Yii::t('app', 'Параметры')?></span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="components" data-bs-parent="#accordionExample">
                    <li>
                        <a href="<?=Url::to(['/parameters/warehouses'])?>"> <?=Yii::t('app', 'Склад')?> </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/parameters/suppliers'])?>"> <?=Yii::t('app', 'Поставщики')?> </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="index.html#elements" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>Elements</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="elements" data-bs-parent="#accordionExample">
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-alerts.html"> Alerts </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-avatar.html"> Avatar </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-badges.html"> Badges </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-breadcrumbs.html"> Breadcrumbs </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-buttons.html"> Buttons </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-buttons-group.html"> Button Groups </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-color-library.html"> Color Library </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-dropdown.html"> Dropdown </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-infobox.html"> Infobox </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-loader.html"> Loader </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-pagination.html"> Pagination </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-popovers.html"> Popovers </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-progressbar.html"> Progress Bar </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-search.html"> Search </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-tooltips.html"> Tooltips </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-treeview.html"> Treeview </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/element-typography.html"> Typography </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TABLES AND FORMS</span></div>
            </li>

            <li class="menu">
                <a href="index.html#tables" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>Tables</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="tables" data-bs-parent="#accordionExample">

                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/table-basic.html"> Tables </a>
                    </li>

                    <li class="sub-submenu dropend">
                        <a href="index.html#datatable" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Datatable <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="datatable" data-bs-parent="#tables">
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/table-datatable-basic.html"> Basic </a>
                            </li>
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/table-datatable-striped-table.html"> Striped </a>
                            </li>
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/table-datatable-custom.html"> Custom </a>
                            </li>
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/table-datatable-miscellaneous.html"> Miscellaneous </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="index.html#forms" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Forms</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="forms" data-bs-parent="#accordionExample">
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-bootstrap-basic.html"> Basic </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-input-group-basic.html"> Input Group </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-layouts.html"> Layouts </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-validation.html"> Validation </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-input-mask.html"> Input Mask </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-tom-select.html"> Tom Select </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-tagify.html"> Tagify </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-bootstrap-touchspin.html"> TouchSpin </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-maxlength.html"> Maxlength </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-checkbox.html"> Checkbox </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-radio.html"> Radio </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-switches.html"> Switches </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-wizard.html"> Wizards </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-fileupload.html"> File Upload </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-quill.html"> Quill Editor </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-markdown.html"> Markdown Editor </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-date-time-picker.html"> Date Time Picker </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-slider.html"> Slider </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-clipboard.html"> Clipboard </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/form-autoComplete.html"> Auto Complete </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="index.html#pages" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span>Pages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="pages" data-bs-parent="#accordionExample">
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/pages-knowledge-base.html"> Knowledge Base </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/pages-faq.html"> FAQ </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/pages-contact-us.html"> Contact Form </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/user-profile.html"> Users </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/user-account-settings.html"> Account Settings </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/pages-error404.html" target="_blank"> Error </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/pages-maintenence.html" target="_blank"> Maintanence </a>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#login" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign In <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="login" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-boxed-signin.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-cover-signin.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#signup" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign Up <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="signup" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-boxed-signup.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-cover-signup.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#unlock" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Unlock <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="unlock" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-boxed-lockscreen.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-cover-lockscreen.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#reset" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Reset <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="reset" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-boxed-password-reset.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-cover-password-reset.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#twoStep" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Two Step <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="twoStep" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-boxed-2-step-verification.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://designreset.com/cork/html/horizontal-light-menu/auth-cover-2-step-verification.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="index.html#more" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        <span>More</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="more" data-bs-parent="#accordionExample">

                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/map-leaflet.html"> Maps </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/charts-apex.html"> Charts </a>
                    </li>
                    <li>
                        <a href="https://designreset.com/cork/html/horizontal-light-menu/widgets.html"> Widgets </a>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="index.html#layouts" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Layouts <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="layouts" data-bs-parent="#more">
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/layout-blank-page.html"> Blank Page </a>
                            </li>
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/layout-empty.html"> Empty Page </a>
                            </li>
                            <li>
                                <a href="https://designreset.com/cork/html/horizontal-light-menu/layout-full-width.html"> Full Width </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" href="https://designreset.com/cork/documentation/index.html"> Documentation </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://designreset.com/cork/documentation/changelog.html"> Changelog </a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item dropdown user-profile-dropdown  order-lg-0 order-1 menu-login">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-container">
                        <div class="avatar avatar-sm avatar-indicators avatar-online">
                            <img alt="avatar" src="/ru/statistics/../../cork-style2/src/assets/img/profile-30.png" class="rounded-circle">
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section dropdown-login">
                        <div class="media mx-auto">
                            <div class="emoji me-2">
                                👋
                            </div>
                            <div class="media-body">
                                <h5>Javohir</h5>
                                <p>Xodim</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Профиль</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="http://localhost:5050/ru/site/logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Выйти</span>
                        </a>
                    </div>
                </div>

            </li>

        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->