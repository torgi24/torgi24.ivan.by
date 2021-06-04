<?

$profile = profile2_load_by_user($content['field_jur_name']['#object']->uid);

$wrapper = entity_metadata_wrapper('profile2', $profile['juridical']);

$profile_user = user_load($content['field_jur_name']['#object']->uid);
//print date("d.m.Y",$wrapper->field_jur_authface->field_phys_ph_borndate->value());

//Название организации / предприятия


//Лицо, уполномоченное на заключение договора
//print $wrapper->field_jur_authface->field_jur_jp_phone->value();

?>

<div class="title">

    <div class="title-name">
        <p>Личный кабинет пользователя</p>
    </div>
    <a href='<?= "/user/" . $profile_user->uid . "/edit/juridical" ?>' class="edit-svg">
        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_dd)">
                <g clip-path="url(#clip0)">
                    <path d="M30.7659 18.2177C30.3669 18.2177 30.0436 18.541 30.0436 18.94V25.3528C30.0422 26.549 29.0731 27.5184 27.8769 27.5195H7.61125C6.41502 27.5184 5.44591 26.549 5.4445 25.3528V6.53166C5.44591 5.33572 6.41502 4.36632 7.61125 4.36491H14.024C14.423 4.36491 14.7463 4.04159 14.7463 3.64266C14.7463 3.24401 14.423 2.92041 14.024 2.92041H7.61125C5.61773 2.92267 4.00226 4.53814 4 6.53166V25.3531C4.00226 27.3466 5.61773 28.962 7.61125 28.9643H27.8769C29.8704 28.962 31.4859 27.3466 31.4881 25.3531V18.94C31.4881 18.541 31.1648 18.2177 30.7659 18.2177Z" fill="#3686CD" />
                    <path d="M31.202 1.06196C29.9327 -0.207339 27.8748 -0.207339 26.6055 1.06196L13.7201 13.9474C13.6318 14.0357 13.5681 14.1451 13.5348 14.2653L11.8403 20.3827C11.7706 20.6335 11.8414 20.9021 12.0254 21.0863C12.2096 21.2703 12.4782 21.3411 12.729 21.2717L18.8464 19.577C18.9666 19.5437 19.0761 19.4799 19.1644 19.3916L32.0495 6.50592C33.3168 5.23578 33.3168 3.17962 32.0495 1.90947L31.202 1.06196ZM15.2939 14.4168L25.8396 3.87084L29.2406 7.2719L18.6946 17.8179L15.2939 14.4168ZM14.6145 15.7801L17.3317 18.4975L13.5732 19.5389L14.6145 15.7801ZM31.0282 5.48461L30.2622 6.25059L26.8609 2.84925L27.6271 2.08327C28.3322 1.37823 29.4754 1.37823 30.1804 2.08327L31.0282 2.93078C31.7321 3.63667 31.7321 4.77901 31.0282 5.48461Z" fill="#3686CD" />
                </g>
            </g>
            <defs>
                <filter id="filter0_dd" x="0" y="0" width="37" height="37" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape" />
                </filter>
                <clipPath id="clip0">
                    <rect x="4" width="29" height="29" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </a>
</div>
<style>

            .table-info.ur-litso{

                    width:80%;
            }
            .table-info.ur-litso td {
            width: 30%;
           }
           .table-info.ur-litso td:last-of-type {
                 padding-left:145px;
                 width:65%;
           }
      </style>
<div class="user-info">
    <div class="photo">
      <img src="<?= !empty($profile_user->field_user_img['und'][0]['filename']) ? '/sites/default/files/'.$profile_user->field_user_img['und'][0]['filename'] : '/sites/default/files/nooname_2.png'?>" alt="upload_user_photo">
    </div>
    <div class="text-user-info">
        <div class="pseudonym">
            <p>Псевдоним: &nbsp; </p>
            <p><?= ' Участник № '.$content['field_jur_name']['#object']->uid?></p>
        </div>
        <div class="organization">
            <p>Организация: &nbsp; </p>
            <p><?php print $wrapper->field_jur_name->value(); ?></p>
        </div>
        <div class="segment">
            <p>Целевой сегмент: &nbsp;</p>
            <p><?= end($profile_user->roles)?></p>
        </div>
        <div class="user-number">
            <p>Номер участника: &nbsp;</p>
            <p><?= $content['field_jur_name']['#object']->uid?></p>
        </div>
        <div class="personal-info">
            <p>Лицо, уполномоченное для заключения договора</p>
        </div>
        <table class="table-info ur-litso SS">
            <tr>
                <td>Фамилия:</td>
                <td><?php print $wrapper->field_jur_authface->field_jur_af_lastname->value(); ?></td>
            </tr>
            <tr>
                <td>Имя:</td>
                <td><?php print $wrapper->field_jur_authface->field_jur_af_name->value(); ?></td>
            </tr>
            <tr>
                <td>Отчество:</td>
                <td><?php print $wrapper->field_jur_authface->field_jur_af_patrname->value(); ?></td>
            </tr>
            <tr>
                <td>Должность:</td>
                <td><?php print $wrapper->field_jur_authface->field_jur_af_jtitle->value(); ?></td>
            </tr>
            <tr>
                <td>Документ, на основании которого действует лицо *:</td>
                <td><?php print $wrapper->field_jur_authface->field_jur_af_authdoc->value(); ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?= $profile_user->mail?></td>
            </tr>
        </table>
        <div class="personal-info">
            <p>Свидетельство о регистрации юр. лица (ЕГР)</p>
        </div>
        <table class="table-info ur-litso">
            <tr>
                <td>УНП:</td>
                <td><?php print $wrapper->field_jur_regcertificate->field_jur_rc_unp->value(); ?></td>
            </tr>
            <tr>
                <td>ОКПО:</td>
                <td><?php print $wrapper->field_jur_regcertificate->field_jur_rc_okpo->value(); ?></td>
            </tr>
            <tr>
                <td>Регистрационный номер:</td>
                <td><?php print $wrapper->field_jur_regcertificate->field_jur_rc_regnumber->value(); ?></td>
            </tr>
            <tr>
                <td>Регистрирующий орган:</td>
                <td><?php print $wrapper->field_jur_regcertificate->field_jur_rc_regauthority->value(); ?></td>
            </tr>
            <tr>
                <td>Дата государственной регистрации:</td>
                <td><?php print date("d.m.Y", $wrapper->field_jur_regcertificate->field_jur_rc_regdate->value()); ?></td>
            </tr>
        </table>
        <div class="personal-info">
            <p>Банковские реквизиты</p>
        </div>
        <table class="table-info ur-litso">
            <tr>
                <td>Наименование банка:</td>
                <td><?php print $wrapper->field_jur_bankrecvizites->field_jur_br_bankname->value(); ?></td>
            </tr>
            <tr>
                <td>Код банка:</td>
                <td><?php print $wrapper->field_jur_bankrecvizites->field_jur_br_bankcode->value(); ?></td>
            </tr>
            <tr>
                <td>Номер карт-счета:</td>
                <td><?php print $wrapper->field_jur_bankrecvizites->field_jur_br_account_test->value(); ?></td>
            </tr>
        </table>
        <div class="personal-info">
            <p>юридический адрес</p>
        </div>
        <table class="table-info ur-litso">


            <tr>
                <td>Адрес:</td>
                <td><?= $wrapper->field_jur_juraddress->field_jur_ja_country->value().', '.
                     $wrapper->field_jur_juraddress->field_jur_ja_city->value().', '.
                     $wrapper->field_jur_juraddress->field_jur_ja_street->value().', '.
                     $wrapper->field_jur_juraddress->field_jur_ja_homecorpus->value().', '.
                     $wrapper->field_jur_juraddress->field_jur_ja_appartment->value();
                    ?></td>
            </tr>
            <tr>
                <td>Факс:</td>
                <td><?php print $wrapper->field_jur_juraddress->field_jur_ja_fax->value(); ?></td>
            </tr>
            <tr>
                <td>Индекс:</td>
                <td><?php print $wrapper->field_jur_juraddress->field_jur_ja_index->value(); ?></td>
            </tr>
        </table>
        <div class="personal-info">
            <p>Почтовый адрес</p>
        </div>
        <table class="table-info ur-litso">
            <tr>
                <td>Адрес:</td>
                <td><?= $wrapper->field_jur_postaddress->field_jur_pa_country->value().', '.
                    $wrapper->field_jur_postaddress->field_jur_pa_city->value().', '.
                    $wrapper->field_jur_postaddress->field_jur_pa_street->value().', '.
                    $wrapper->field_jur_postaddress->field_jur_pa_homecorpus->value().', '.
                    $wrapper->field_jur_postaddress->field_jur_pa_appartment->value();
                    ?></td>
            </tr>
            <tr>
                <td>Индекс:</td>
                <td><?php print $wrapper->field_jur_postaddress->field_jur_pa_index->value(); ?></td>
            </tr>
        </table>
    </div>
</div>
