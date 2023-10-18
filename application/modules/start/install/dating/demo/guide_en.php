<?php

return [
    'admin' => [
        1 => [
            'page' => false,
            'selector' => '',
            'attr' => '',
            'title' => 'Welcome to your future dating site!',
            'content' => '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/k3UGFrMhozM?wmode=transparent" class="embed-responsive-item"  frameborder="0" allowfullscreen></iframe></div><br><br>Let us show you around the administration panel.<br><br>Click <strong>Next</strong> to continue, or click <strong>Close</strong> if you want to hide this guide. You will be able to open it again from the graduation cap icon above.',
        ],
        2 => [
            'page' => 'admin/start',
            'selector' => '.quick-stats',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Quick stats',
            'content' => 'This site section shows you how many new registrations you have had since last week, your earnings this week, and the average amount that your site members spend on your dating site.<br><br>Note that it is possible to display any info here. Please let us know what you are specifically interested in.',
        ],
        3 => [
            'page' => 'admin/start',
            'selector' => '#chart_div',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'New visits this week',
            'content' => 'This graph displays dummy information about the site visits right now, but once you have your site installed and active, it will start recording real people visits.',
        ],
        4 => [
            'page' => 'admin/start',
            'selector' => '.dashboard__content',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Moderation wall',
            'content' => 'In the moderation wall, you can perform moderation duties directly from the homepage, there is no need to go any deeper.<br><br>The list of moderated objects may include user profiles, uploaded photos, audio and video files, payments, abuse reports, and more.',
        ],
        5 => [
            'page' => '',
            'selector' => '#sidebar-menu',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Main navigation',
            'content' => 'The left menu will navigate you through the sections of the administration panel.<br><br>All sections are organised logically: everything user-related, everything that concerns user activity (including file uploads and payments), site setup options inside and out, and extra features.',
        ],
        6 => [
            'page' => 'admin/ausers',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Administrators',
            'content' => 'Create as many administrator accounts as you want here. You can also create moderators who will have limited access to the site sections — only the ones you allow them access to.',
        ],
        7 => [
            'page' => 'admin/users/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Site users',
            'content' => 'Here you will find all the information about your site users: their names and email addresses, when they signed up, how much money they have on their site accounts.<br><br>You can filter users by name, nickname, and so on.',
        ],
        8 => [
            'page' => 'admin/tickets',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Communication',
            'content' => 'This section contains all messages that your site members send to you via the built-in tickets system.<br><br>You can also contact any user directly. The message will appear in their personal cabinet.',
        ],
        9 => [
            'page' => 'admin/media',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Media',
            'content' => 'Media is a storage space for all files that your site members can upload: photos, videos, and audio files. You can delete any file or mark it for adults over 18 only.<br><br>You can also manage users albums here and create admin albums which are available to all.',
        ],
        10 => [
            'page' => 'admin/moderation',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Moderation',
            'content' => 'Moderation rules give you control over user-generated content. The system will also check all user texts and comments for banned words. Which words are considered banned is up for you to decide.<br><br>Once you are done setting it up, you can review the moderated content in section Objects, or in the Moderation wall on the homepage.',
        ],
        11 => [
            'page' => 'admin/payments/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Payments',
            'content' => 'Manage payment systems that you want to make available on your site and set up the site currency.<br><br>Activate paid services, put your own price on each service under <strong>Services</strong>, or a membership package under <strong>Access permissions</strong>. You can create a subscription that will last 30 days or a year, it is up to you.',
        ],
        12 => [
            'page' => 'admin/banners',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Banner ads',
            'content' => 'You can let your dating site members post their own banners for a fee. You get to manage the prices, banner positions on the site pages, and the placement period. In this same section you preview the user banners before allowing them to be published.<br><br>You can also post any banner of your own or of your partners, directly from the administration panel.',
        ],
        13 => [
            'page' => 'admin/start/menu/interface-items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Site interface',
            'content' => 'Modify your site design theme, logo, fonts and colours with the Interface tools under <strong>Themes</strong>.<br><br>While the <strong>Geo maps</strong> block pretty much speaks for itself, the <strong>Menus</strong> editor will let you manage menus across the user and the admin interface.',
        ],
        14 => [
            'page' => 'admin/start/menu/content_items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Site content',
            'content' => 'The wide set of tools will help you manage your dating site content including locations (countries, regions, cities), user types (female, male, etc.), terms and conditions, and other info.<br><br>Use the built-in <strong>Languages</strong> tool to create new language versions and to edit the words and phrases that are displayed on your site.<br><br>Connect to RSS feeds to receive daily news and horoscope predictions, or create them manually.',
        ],
        15 => [
            'page' => 'admin/start/menu/system-items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'System settings',
            'content' => 'Fine tune your site. You can manage the size of every thumbnail, or the permitted audio file formats, or even the number of search results per page. Or, you can simply keep the settings that come with the site by default, that will be enough.<br><br>What you may want to pay closer attention to, though, is SEO settings and connection to the social networks.',
        ],
        16 => [
            'page' => 'admin/marketing/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Marketing',
            'content' => 'We want to help you learn more about your dating site users and visitors, engage them by using curated messages at the appropriate time and place, receive feedback and offer support. You can do it with the popular customer communication platform Intercom.io that we offer you integration with.<br><br>We will also connect your site to Google Analytics for no extra fee. Contact us in chat for more details!',
        ],
        17 => [
            'page' => 'admin/start/menu/add_ons_items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Extra add-ons',
            'content' => 'This section is about the extra functionality that you bring to your dating website by means of modules (add-ons). These extra add-ons will let you entertain your site members and earn money.<br><br>There are a lot of other options in the Dating Pro Marketplace, including more add-ons, design themes, third-party integrations, and marketing services. Click <strong>Visit marketplace</strong> button below to find out more.',
        ],
        18 => [
            'page' => 'admin/start',
            'selector' => '',
            'attr' => '',
            'title' => 'Back to the dashboard',
            'content' => 'Good job! We have completed the overview of the administration panel.<br><br>What comes next?<br><br>Check the <a href="https://www.datingpro.com/academy/" target="_blank">Dating Pro Academy</a> for FAQs and detailed instructions. Take a look at the <a href="https://www.datingpro.com/academy/setup/pre-launch-checklist-for-your-dating-website/" target="_blank">pre-launch checklist</a>.<br><br>Want to learn the prices for the Dating Pro packages? Click <strong>Buy Now</strong> to view the pricing page.<br><br>Or simply come to chat with us, we will be glad to talk to you!',
        ],
    ],
    'user' => [
        1 => [
            'page' => 'users/search',
            'selector' => '',
            'attr' => '',
            'title' => 'Welcome to your future dating site!',
            'content' => '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/XVd9HXjAkBc?wmode=transparent" class="embed-responsive-item"  frameborder="0" allowfullscreen></iframe></div><br><br>Let us show you around the user mode. This is what your site members will see after they sign up on your site.<br><br>Click <strong>Next</strong> to continue, or click <strong>Close</strong> if you want to hide this guide. You will be able to open it again from the graduation cap icon above.',
        ],
        2 => [
            'page' => false,
            'selector' => '.menu-alerts-item',
            'attr' => 'background:rgba(255,0,0,.2);',
            'function' => '$(".menu-alerts-item .dropdown-menu").addClass("guide-show");',
            'reset' => '$(".menu-alerts-item .dropdown-menu").removeClass("guide-show");',
            'title' => 'Site notifications',
            'content' => 'In the top left corner of the page, your site members will see notifications whenever they receive a new message, someone visits their profile, someone sends them a gift, and so on. System messages — that is, emails from the site administrator — will also be shown here.',
        ],
        3 => [
            'page' => false,
            'selector' => '.left-menu__user',
            'function' => '$("#slidemenu-outer,#slidemenu").show();',
            'reset' => '$("#slidemenu,#slidemenu-outer").hide();',
            'attr' => 'background:rgba(255,0,0,.2);margin-right:-15px;padding-right:15px;',
            'title' => 'Left-hand menu',
            'content' => 'This menu is the main navigation tool for the site members. It combines links to every relevant site section.<br><br>Directly below the search form, you see the information about the user\'s internal account. The plus icon will bring the user to the page where s/he can update their account.',
        ],
        4 => [
            'page' => false,
            'selector' => '.user_quick_menu .dropdown-menu',
            'function' => '$(".user_quick_menu .dropdown-menu").addClass("guide-show");',
            'reset' => '$(".user_quick_menu .dropdown-menu").removeClass("guide-show");',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Right-hand menu',
            'content' => 'Into the right-hand menu, we have put the main service links to make it convenient to the users: personal profile, settings, account, and log out option.<br><br>Now let\'s take a look at the personal account of a site user.',
        ],
        5 => [
            'page' => 'users/account',
            'selector' => '.my-account-menu',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Account',
            'content' => 'This section combines the most of the site\'s paid options and services. A site user can go directly here and choose something on their own, but the system will be offering them paid services or a paid membership across the website as well.<br><br>Click <strong>Next</strong> to view the membership groups page.',
        ],
        6 => [
            'page' => 'access_permissions/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Membership groups',
            'content' => 'This page is designed to make it easy to compare access permissions of different membership groups. The site user then selects the appropriate period and proceeds to checkout.<br><br>Now, let\'s take a look at a person\'s own profile page.',
        ],
        7 => [
            'page' => 'users/profile',
            'selector' => '',
            'function' => '$(document).ready(function(){$(\'[data-toggle="popover"]\').popover(\'show\');$(".popover-content").css("box-shadow","2px 2px 10px #d9534f");$(".user_preview-js").find(".media").css("overflow", "visible");});',
            'reset' => '',
            'attr' => '',
            'title' => 'User\'s own profile',
            'content' => 'On their own profile page, the user will be able to activate one of the special services, for example, highlight their profile or lift it up in the search. From this page, one can also send short emails to friends and invite them to join your dating site.<br><br>How does another person\'s profile page look like? Click <strong>Next</strong> to find out.',
        ],
        8 => [
            'page' => 'users/view/11/profile',
            'selector' => '',
            'function' => '$(document).ready(function(){$(\'[data-toggle="popover"]\').popover(\'show\');$(".popover-content").css("box-shadow","2px 2px 10px #d9534f");$(".user_preview-js").find(".media").css("overflow", "visible")});',
            'reset' => '',
            'attr' => '',
            'title' => 'View someone\'s profile',
            'content' => 'From another user\'s profile page, one can send them a message, a kiss or a wink, send a friendship request, add them to favourites, and so on.<br><br>Now, let\'s take a look at the activity wall of this site member.',
        ],
        9 => [
            'page' => 'users/view/11/wall',
            'selector' => '.b-timeline-addpost',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);margin-top:-10px;padding-top:20px;',
            'title' => 'User\'s activity wall',
            'content' => 'One can leave a message on the user\'s activity wall or share a photo, a song or a video with them and the other profile visitors. You also see if someone else or this user posts anything on the wall.<br><br>Let\'s take a look at the user\'s multimedia gallery now.',
        ],
        10 => [
            'page' => 'users/view/11/gallery',
            'selector' => '.view-user__media',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);padding:5px;',
            'title' => 'User\'s multimedia gallery',
            'content' => 'On this page, you will see if this person has uploaded any photos, audio and video files, and added other people\'s files into favourites. Albums stand for files collections.<br><br>Now let us take a look at the all-around activity wall on the homepage.',
        ],
        11 => [
            'page' => 'start/homepage',
            'selector' => '.g-flatty-block',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);padding:5px;',
            'title' => 'Recent activity wall',
            'content' => 'The recent activity wall combines the following activity of the site member and his or her friends: file uploads, wall posts, starting and ending a friendship, and creating events.<br><br>The users have control over which of their actions to display and to whom, also which of the actions they themselves want to be notified of.<br><br>Now, let us open the left-hand menu again.',
        ],
        12 => [
            'page' => 'start/homepage/#user_user-menu-activities',
            'selector' => '#user_user-menu-activities',
            'function' => '$("#slidemenu-outer,#slidemenu").show();',
            'reset' => '$("#slidemenu,#slidemenu-outer").hide();',
            'attr' => 'background:rgba(255,0,0,.2);margin-right:-15px;padding-right:15px;',
            'title' => 'Site activities',
            'content' => 'Site activities are here to engage the site members and to let them get to know each other better.<br><br>Let us take a closer look at some of them, starting with associations.',
        ],
        13 => [
            'page' => 'associations/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Associations',
            'content' => 'Associations are about breaking the ice between two site members and helping them start a conversation. One person can send another one an association — that is, compare him or her to an object or an animal — whatever the site admin offers them.<br><br>All pictures and prompt phrases are managed in the administration panel.<br><br>Next, let\'s go to the LikeMe page.',
        ],
        14 => [
            'page' => 'like_me/index/demo_guide',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'LikeMe rating game',
            'content' => 'LikeMe is a Tinder-like add-on that lets site members like or skip each other. In case there is a match, they can communicate directly on the site. LikeMe takes into account the person\'s partner preferences that they indicate in their profile.<br><br>Our next step will be the Companions feature.',
        ],
        15 => [
            'page' => 'companions/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Companions',
            'content' => 'The Companions add-on creates an online space where your site members can look for travel companions or someone to go to an event with.<br><br>A site member creates an event by telling where she or he would like to go and who with — a man or a woman, the preferred age range, and whether there are going to be extra costs involved, to be shared or not. Other site members can view the event and request to be accepted.<br><br>Click <strong>Next</strong> to complete the tour.',
        ],
        16 => [
            'page' => 'users/search',
            'selector' => '',
            'attr' => '',
            'title' => 'Back to the search page',
            'content' => 'Good job! We have completed the overview of the user mode.<br><br>What comes next?<br><br>Check the <a href="https://www.datingpro.com/academy/" target="_blank">Dating Pro Academy</a> for FAQs and detailed instructions. Take a look at the <a href="https://www.datingpro.com/academy/setup/pre-launch-checklist-for-your-dating-website/" target="_blank">pre-launch checklist</a>.<br><br>Want to learn the prices for the Dating Pro packages? Click <strong>Buy now</strong> to view the pricing page.',
        ],
    ],
];