<?php
/**
 * Entypo icons from thememountain
 *
 * @param $icons - taken from filter - vc_map param field settings['source'] provided icons (default empty array).
 * If array categorized it will auto-enable category dropdown
 *
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
add_action( 'vc_base_register_admin_css', 'tm_iconpicker_base_register_css' );
add_action( 'vc_backend_editor_enqueue_js_css', 'tm_iconpicker_editor_css' );

function tm_iconpicker_base_register_css () {
	wp_register_style( 'tm-entypo-icon', plugins_url('', dirname( __FILE__ ) ).'/assets/css/js_composer_backend_editor_icons.css', false );
}
function tm_iconpicker_editor_css() {
	// Fonts
	wp_enqueue_style( 'tm-entypo-icon' );
}


//
add_filter( 'vc_iconpicker-type-tm-entypo', 'tm_iconpicker_type_entypo' );
function tm_iconpicker_type_entypo( $icons ) {
	$entypo_icons = array(
		array( 'tm-entypo-icon-add-to-list' => 'Add To List' ),
		array( 'tm-entypo-icon-add-user' => 'Add User' ),
		array( 'tm-entypo-icon-address' => 'Address' ),
		array( 'tm-entypo-icon-adjust' => 'Adjust' ),
		array( 'tm-entypo-icon-air' => 'Air' ),
		array( 'tm-entypo-icon-aircraft-landing' => 'Aircraft Landing' ),
		array( 'tm-entypo-icon-aircraft-take-off' => 'Aircraft Take Off' ),
		array( 'tm-entypo-icon-aircraft' => 'Aircraft' ),
		array( 'tm-entypo-icon-align-bottom' => 'Align Bottom' ),
		array( 'tm-entypo-icon-align-horizontal-middle' => 'Align Horizontal Middle' ),
		array( 'tm-entypo-icon-align-left' => 'Align Left' ),
		array( 'tm-entypo-icon-align-right' => 'Align Right' ),
		array( 'tm-entypo-icon-align-top' => 'Align Top' ),
		array( 'tm-entypo-icon-align-vertical-middle' => 'Align Vertical Middle' ),
		array( 'tm-entypo-icon-archive' => 'Archive' ),
		array( 'tm-entypo-icon-area-graph' => 'Area Graph' ),
		array( 'tm-entypo-icon-arrow-bold-down' => 'Arrow Bold Down' ),
		array( 'tm-entypo-icon-arrow-bold-left' => 'Arrow Bold Left' ),
		array( 'tm-entypo-icon-arrow-bold-right' => 'Arrow Bold Right' ),
		array( 'tm-entypo-icon-arrow-bold-up' => 'Arrow Bold Up' ),
		array( 'tm-entypo-icon-arrow-down' => 'Arrow Down' ),
		array( 'tm-entypo-icon-arrow-left' => 'Arrow Left' ),
		array( 'tm-entypo-icon-arrow-long-down' => 'Arrow Long Down' ),
		array( 'tm-entypo-icon-arrow-long-left' => 'Arrow Long Left' ),
		array( 'tm-entypo-icon-arrow-long-right' => 'Arrow Long Right' ),
		array( 'tm-entypo-icon-arrow-long-up' => 'Arrow Long Up' ),
		array( 'tm-entypo-icon-arrow-right' => 'Arrow Right' ),
		array( 'tm-entypo-icon-arrow-up' => 'Arrow Up' ),
		array( 'tm-entypo-icon-arrow-with-circle-down' => 'Arrow With Circle Down' ),
		array( 'tm-entypo-icon-arrow-with-circle-left' => 'Arrow With Circle Left' ),
		array( 'tm-entypo-icon-arrow-with-circle-right' => 'Arrow With Circle Right' ),
		array( 'tm-entypo-icon-arrow-with-circle-up' => 'Arrow With Circle Up' ),
		array( 'tm-entypo-icon-attachment' => 'Attachment' ),
		array( 'tm-entypo-icon-awareness-ribbon' => 'Awareness Ribbon' ),
		array( 'tm-entypo-icon-back-in-time' => 'Back In Time' ),
		array( 'tm-entypo-icon-back' => 'Back' ),
		array( 'tm-entypo-icon-bar-graph' => 'Bar Graph' ),
		array( 'tm-entypo-icon-battery' => 'Battery' ),
		array( 'tm-entypo-icon-beamed-note' => 'Beamed Note' ),
		array( 'tm-entypo-icon-bell' => 'Bell' ),
		array( 'tm-entypo-icon-blackboard' => 'Blackboard' ),
		array( 'tm-entypo-icon-block' => 'Block' ),
		array( 'tm-entypo-icon-book' => 'Book' ),
		array( 'tm-entypo-icon-bookmark' => 'Bookmark' ),
		array( 'tm-entypo-icon-bookmarks' => 'Bookmarks' ),
		array( 'tm-entypo-icon-bowl' => 'Bowl' ),
		array( 'tm-entypo-icon-box' => 'Box' ),
		array( 'tm-entypo-icon-briefcase' => 'Briefcase' ),
		array( 'tm-entypo-icon-browser' => 'Browser' ),
		array( 'tm-entypo-icon-brush' => 'Brush' ),
		array( 'tm-entypo-icon-bucket' => 'Bucket' ),
		array( 'tm-entypo-icon-bug' => 'Bug' ),
		array( 'tm-entypo-icon-cake' => 'Cake' ),
		array( 'tm-entypo-icon-calculator' => 'Calculator' ),
		array( 'tm-entypo-icon-calendar' => 'Calendar' ),
		array( 'tm-entypo-icon-camera' => 'Camera' ),
		array( 'tm-entypo-icon-ccw' => 'Ccw' ),
		array( 'tm-entypo-icon-chat' => 'Chat' ),
		array( 'tm-entypo-icon-check' => 'Check' ),
		array( 'tm-entypo-icon-down' => 'Down' ),
		array( 'tm-entypo-icon-left' => 'Left' ),
		array( 'tm-entypo-icon-right' => 'Right' ),
		array( 'tm-entypo-icon-down-open-mini' => 'Down Open Mini' ),
		array( 'tm-entypo-icon-left-open-mini' => 'Left Open Mini' ),
		array( 'tm-entypo-icon-right-open-mini' => 'Right Open Mini' ),
		array( 'tm-entypo-icon-up-open-mini' => 'Up Open Mini' ),
		array( 'tm-entypo-icon-down-open-big' => 'Down Open Big' ),
		array( 'tm-entypo-icon-left-open-big' => 'Left Open Big' ),
		array( 'tm-entypo-icon-right-open-big' => 'Right Open Big' ),
		array( 'tm-entypo-icon-up-open-big' => 'Up Open Big' ),
		array( 'tm-entypo-icon-up' => 'Up' ),
		array( 'tm-entypo-icon-down-circled' => 'Down Circled' ),
		array( 'tm-entypo-icon-left-circled' => 'Left Circled' ),
		array( 'tm-entypo-icon-right-circled' => 'Right Circled' ),
		array( 'tm-entypo-icon-up-circled' => 'Up Circled' ),
		array( 'tm-entypo-icon-circle-with-cross' => 'Circle With Cross' ),
		array( 'tm-entypo-icon-circle-with-minus' => 'Circle With Minus' ),
		array( 'tm-entypo-icon-circle-with-plus' => 'Circle With Plus' ),
		array( 'tm-entypo-icon-circle' => 'Circle' ),
		array( 'tm-entypo-icon-circular-graph' => 'Circular Graph' ),
		array( 'tm-entypo-icon-clapperboard' => 'Clapperboard' ),
		array( 'tm-entypo-icon-classic-computer' => 'Classic Computer' ),
		array( 'tm-entypo-icon-clipboard' => 'Clipboard' ),
		array( 'tm-entypo-icon-clock' => 'Clock' ),
		array( 'tm-entypo-icon-cloud' => 'Cloud' ),
		array( 'tm-entypo-icon-code' => 'Code' ),
		array( 'tm-entypo-icon-cog' => 'Cog' ),
		array( 'tm-entypo-icon-colours' => 'Colours' ),
		array( 'tm-entypo-icon-compass' => 'Compass' ),
		array( 'tm-entypo-icon-fast-backward' => 'Fast Backward' ),
		array( 'tm-entypo-icon-fast-forward' => 'Fast Forward' ),
		array( 'tm-entypo-icon-jump-to-start' => 'Jump To Start' ),
		array( 'tm-entypo-icon-next' => 'Next' ),
		array( 'tm-entypo-icon-paus' => 'Paus' ),
		array( 'tm-entypo-icon-play' => 'Play' ),
		array( 'tm-entypo-icon-record' => 'Record' ),
		array( 'tm-entypo-icon-stop' => 'Stop' ),
		array( 'tm-entypo-icon-volume' => 'Volume' ),
		array( 'tm-entypo-icon-copy' => 'Copy' ),
		array( 'tm-entypo-icon-creative-commons-attribution' => 'Creative Commons Attribution' ),
		array( 'tm-entypo-icon-creative-commons-noderivs' => 'Creative Commons Noderivs' ),
		array( 'tm-entypo-icon-creative-commons-noncommercial-eu' => 'Creative Commons Noncommercial Eu' ),
		array( 'tm-entypo-icon-creative-commons-noncommercial-us' => 'Creative Commons Noncommercial Us' ),
		array( 'tm-entypo-icon-creative-commons-public-domain' => 'Creative Commons Public Domain' ),
		array( 'tm-entypo-icon-creative-commons-remix' => 'Creative Commons Remix' ),
		array( 'tm-entypo-icon-creative-commons-share' => 'Creative Commons Share' ),
		array( 'tm-entypo-icon-creative-commons-sharealike' => 'Creative Commons Sharealike' ),
		array( 'tm-entypo-icon-creative-commons' => 'Creative Commons' ),
		array( 'tm-entypo-icon-credit-card' => 'Credit Card' ),
		array( 'tm-entypo-icon-credit' => 'Credit' ),
		array( 'tm-entypo-icon-crop' => 'Crop' ),
		array( 'tm-entypo-icon-cancel' => 'Cancel' ),
		array( 'tm-entypo-icon-cup' => 'Cup' ),
		array( 'tm-entypo-icon-cw' => 'Cw' ),
		array( 'tm-entypo-icon-cycle' => 'Cycle' ),
		array( 'tm-entypo-icon-database' => 'Database' ),
		array( 'tm-entypo-icon-dial-pad' => 'Dial Pad' ),
		array( 'tm-entypo-icon-direction' => 'Direction' ),
		array( 'tm-entypo-icon-document-landscape' => 'Document Landscape' ),
		array( 'tm-entypo-icon-document' => 'Document' ),
		array( 'tm-entypo-icon-documents' => 'Documents' ),
		array( 'tm-entypo-icon-dot-single' => 'Dot Single' ),
		array( 'tm-entypo-icon-dots-three-horizontal' => 'Dots Three Horizontal' ),
		array( 'tm-entypo-icon-dots-three-vertical' => 'Dots Three Vertical' ),
		array( 'tm-entypo-icon-dots-two-horizontal' => 'Dots Two Horizontal' ),
		array( 'tm-entypo-icon-dots-two-vertical' => 'Dots Two Vertical' ),
		array( 'tm-entypo-icon-download' => 'Download' ),
		array( 'tm-entypo-icon-drink' => 'Drink' ),
		array( 'tm-entypo-icon-drive' => 'Drive' ),
		array( 'tm-entypo-icon-drop' => 'Drop' ),
		array( 'tm-entypo-icon-edit' => 'Edit' ),
		array( 'tm-entypo-icon-email' => 'Email' ),
		array( 'tm-entypo-icon-emoji-flirt' => 'Emoji Flirt' ),
		array( 'tm-entypo-icon-emoji-happy' => 'Emoji Happy' ),
		array( 'tm-entypo-icon-emoji-neutral' => 'Emoji Neutral' ),
		array( 'tm-entypo-icon-emoji-sad' => 'Emoji Sad' ),
		array( 'tm-entypo-icon-erase' => 'Erase' ),
		array( 'tm-entypo-icon-eraser' => 'Eraser' ),
		array( 'tm-entypo-icon-export' => 'Export' ),
		array( 'tm-entypo-icon-eye-with-line' => 'Eye With Line' ),
		array( 'tm-entypo-icon-eye' => 'Eye' ),
		array( 'tm-entypo-icon-feather' => 'Feather' ),
		array( 'tm-entypo-icon-fingerprint' => 'Fingerprint' ),
		array( 'tm-entypo-icon-flag' => 'Flag' ),
		array( 'tm-entypo-icon-flash' => 'Flash' ),
		array( 'tm-entypo-icon-flashlight' => 'Flashlight' ),
		array( 'tm-entypo-icon-flat-brush' => 'Flat Brush' ),
		array( 'tm-entypo-icon-flow-branch' => 'Flow Branch' ),
		array( 'tm-entypo-icon-flow-cascade' => 'Flow Cascade' ),
		array( 'tm-entypo-icon-flow-line' => 'Flow Line' ),
		array( 'tm-entypo-icon-flow-parallel' => 'Flow Parallel' ),
		array( 'tm-entypo-icon-flow-tree' => 'Flow Tree' ),
		array( 'tm-entypo-icon-flower' => 'Flower' ),
		array( 'tm-entypo-icon-folder-images' => 'Folder Images' ),
		array( 'tm-entypo-icon-folder-music' => 'Folder Music' ),
		array( 'tm-entypo-icon-folder-video' => 'Folder Video' ),
		array( 'tm-entypo-icon-folder' => 'Folder' ),
		array( 'tm-entypo-icon-forward' => 'Forward' ),
		array( 'tm-entypo-icon-funnel' => 'Funnel' ),
		array( 'tm-entypo-icon-game-controller' => 'Game Controller' ),
		array( 'tm-entypo-icon-gauge' => 'Gauge' ),
		array( 'tm-entypo-icon-globe' => 'Globe' ),
		array( 'tm-entypo-icon-graduation-cap' => 'Graduation Cap' ),
		array( 'tm-entypo-icon-grid' => 'Grid' ),
		array( 'tm-entypo-icon-hair-cross' => 'Hair Cross' ),
		array( 'tm-entypo-icon-hand' => 'Hand' ),
		array( 'tm-entypo-icon-heart-outlined' => 'Heart Outlined' ),
		array( 'tm-entypo-icon-heart' => 'Heart' ),
		array( 'tm-entypo-icon-help-with-circle' => 'Help With Circle' ),
		array( 'tm-entypo-icon-help' => 'Help' ),
		array( 'tm-entypo-icon-home' => 'Home' ),
		array( 'tm-entypo-icon-hour-glass' => 'Hour Glass' ),
		array( 'tm-entypo-icon-image-inverted' => 'Image Inverted' ),
		array( 'tm-entypo-icon-image' => 'Image' ),
		array( 'tm-entypo-icon-images' => 'Images' ),
		array( 'tm-entypo-icon-inbox' => 'Inbox' ),
		array( 'tm-entypo-icon-infinity' => 'Infinity' ),
		array( 'tm-entypo-icon-info-with-circle' => 'Info With Circle' ),
		array( 'tm-entypo-icon-info' => 'Info' ),
		array( 'tm-entypo-icon-install' => 'Install' ),
		array( 'tm-entypo-icon-key' => 'Key' ),
		array( 'tm-entypo-icon-keyboard' => 'Keyboard' ),
		array( 'tm-entypo-icon-lab-flask' => 'Lab Flask' ),
		array( 'tm-entypo-icon-landline' => 'Landline' ),
		array( 'tm-entypo-icon-language' => 'Language' ),
		array( 'tm-entypo-icon-laptop' => 'Laptop' ),
		array( 'tm-entypo-icon-layers' => 'Layers' ),
		array( 'tm-entypo-icon-leaf' => 'Leaf' ),
		array( 'tm-entypo-icon-level-down' => 'Level Down' ),
		array( 'tm-entypo-icon-level-up' => 'Level Up' ),
		array( 'tm-entypo-icon-lifebuoy' => 'Lifebuoy' ),
		array( 'tm-entypo-icon-light-bulb' => 'Light Bulb' ),
		array( 'tm-entypo-icon-light-down' => 'Light Down' ),
		array( 'tm-entypo-icon-light-up' => 'Light Up' ),
		array( 'tm-entypo-icon-line-graph' => 'Line Graph' ),
		array( 'tm-entypo-icon-link' => 'Link' ),
		array( 'tm-entypo-icon-list' => 'List' ),
		array( 'tm-entypo-icon-location-pin' => 'Location Pin' ),
		array( 'tm-entypo-icon-location' => 'Location' ),
		array( 'tm-entypo-icon-lock-open' => 'Lock Open' ),
		array( 'tm-entypo-icon-lock' => 'Lock' ),
		array( 'tm-entypo-icon-log-out' => 'Log Out' ),
		array( 'tm-entypo-icon-login' => 'Login' ),
		array( 'tm-entypo-icon-loop' => 'Loop' ),
		array( 'tm-entypo-icon-magnet' => 'Magnet' ),
		array( 'tm-entypo-icon-magnifying-glass' => 'Magnifying Glass' ),
		array( 'tm-entypo-icon-mail' => 'Mail' ),
		array( 'tm-entypo-icon-man' => 'Man' ),
		array( 'tm-entypo-icon-map' => 'Map' ),
		array( 'tm-entypo-icon-mask' => 'Mask' ),
		array( 'tm-entypo-icon-medal' => 'Medal' ),
		array( 'tm-entypo-icon-megaphone' => 'Megaphone' ),
		array( 'tm-entypo-icon-menu' => 'Menu' ),
		array( 'tm-entypo-icon-merge' => 'Merge' ),
		array( 'tm-entypo-icon-message' => 'Message' ),
		array( 'tm-entypo-icon-mic' => 'Mic' ),
		array( 'tm-entypo-icon-minus' => 'Minus' ),
		array( 'tm-entypo-icon-mobile' => 'Mobile' ),
		array( 'tm-entypo-icon-modern-mic' => 'Modern Mic' ),
		array( 'tm-entypo-icon-moon' => 'Moon' ),
		array( 'tm-entypo-icon-mouse-pointer' => 'Mouse Pointer' ),
		array( 'tm-entypo-icon-mouse' => 'Mouse' ),
		array( 'tm-entypo-icon-music' => 'Music' ),
		array( 'tm-entypo-icon-network' => 'Network' ),
		array( 'tm-entypo-icon-new-message' => 'New Message' ),
		array( 'tm-entypo-icon-new' => 'New' ),
		array( 'tm-entypo-icon-news' => 'News' ),
		array( 'tm-entypo-icon-newsletter' => 'Newsletter' ),
		array( 'tm-entypo-icon-note' => 'Note' ),
		array( 'tm-entypo-icon-notification' => 'Notification' ),
		array( 'tm-entypo-icon-notifications-off' => 'Notifications Off' ),
		array( 'tm-entypo-icon-old-mobile' => 'Old Mobile' ),
		array( 'tm-entypo-icon-old-phone' => 'Old Phone' ),
		array( 'tm-entypo-icon-open-book' => 'Open Book' ),
		array( 'tm-entypo-icon-palette' => 'Palette' ),
		array( 'tm-entypo-icon-paper-plane' => 'Paper Plane' ),
		array( 'tm-entypo-icon-pencil' => 'Pencil' ),
		array( 'tm-entypo-icon-phone' => 'Phone' ),
		array( 'tm-entypo-icon-pie-chart' => 'Pie Chart' ),
		array( 'tm-entypo-icon-pin' => 'Pin' ),
		array( 'tm-entypo-icon-plus' => 'Plus' ),
		array( 'tm-entypo-icon-popup' => 'Popup' ),
		array( 'tm-entypo-icon-power-plug' => 'Power Plug' ),
		array( 'tm-entypo-icon-price-ribbon' => 'Price Ribbon' ),
		array( 'tm-entypo-icon-price-tag' => 'Price Tag' ),
		array( 'tm-entypo-icon-print' => 'Print' ),
		array( 'tm-entypo-icon-progress-empty' => 'Progress Empty' ),
		array( 'tm-entypo-icon-progress-full' => 'Progress Full' ),
		array( 'tm-entypo-icon-progress-one' => 'Progress One' ),
		array( 'tm-entypo-icon-progress-two' => 'Progress Two' ),
		array( 'tm-entypo-icon-publish' => 'Publish' ),
		array( 'tm-entypo-icon-quote' => 'Quote' ),
		array( 'tm-entypo-icon-radio' => 'Radio' ),
		array( 'tm-entypo-icon-remove-user' => 'Remove User' ),
		array( 'tm-entypo-icon-reply-all' => 'Reply All' ),
		array( 'tm-entypo-icon-reply' => 'Reply' ),
		array( 'tm-entypo-icon-resize-100' => 'Resize 100' ),
		array( 'tm-entypo-icon-resize-full-screen' => 'Resize Full Screen' ),
		array( 'tm-entypo-icon-retweet' => 'Retweet' ),
		array( 'tm-entypo-icon-rocket' => 'Rocket' ),
		array( 'tm-entypo-icon-round-brush' => 'Round Brush' ),
		array( 'tm-entypo-icon-rss' => 'Rss' ),
		array( 'tm-entypo-icon-ruler' => 'Ruler' ),
		array( 'tm-entypo-icon-save' => 'Save' ),
		array( 'tm-entypo-icon-scissors' => 'Scissors' ),
		array( 'tm-entypo-icon-select-arrows' => 'Select Arrows' ),
		array( 'tm-entypo-icon-share-alternative' => 'Share Alternative' ),
		array( 'tm-entypo-icon-share' => 'Share' ),
		array( 'tm-entypo-icon-shareable' => 'Shareable' ),
		array( 'tm-entypo-icon-shield' => 'Shield' ),
		array( 'tm-entypo-icon-shop' => 'Shop' ),
		array( 'tm-entypo-icon-shopping-bag' => 'Shopping Bag' ),
		array( 'tm-entypo-icon-shopping-basket' => 'Shopping Basket' ),
		array( 'tm-entypo-icon-shopping-cart' => 'Shopping Cart' ),
		array( 'tm-entypo-icon-shuffle' => 'Shuffle' ),
		array( 'tm-entypo-icon-signal' => 'Signal' ),
		array( 'tm-entypo-icon-sound-mix' => 'Sound Mix' ),
		array( 'tm-entypo-icon-sound-mute' => 'Sound Mute' ),
		array( 'tm-entypo-icon-sound' => 'Sound' ),
		array( 'tm-entypo-icon-sports-club' => 'Sports Club' ),
		array( 'tm-entypo-icon-spreadsheet' => 'Spreadsheet' ),
		array( 'tm-entypo-icon-squared-cross' => 'Squared Cross' ),
		array( 'tm-entypo-icon-squared-minus' => 'Squared Minus' ),
		array( 'tm-entypo-icon-squared-plus' => 'Squared Plus' ),
		array( 'tm-entypo-icon-star-outlined' => 'Star Outlined' ),
		array( 'tm-entypo-icon-star' => 'Star' ),
		array( 'tm-entypo-icon-stopwatch' => 'Stopwatch' ),
		array( 'tm-entypo-icon-suitcase' => 'Suitcase' ),
		array( 'tm-entypo-icon-swap' => 'Swap' ),
		array( 'tm-entypo-icon-sweden' => 'Sweden' ),
		array( 'tm-entypo-icon-switch' => 'Switch' ),
		array( 'tm-entypo-icon-tablet-mobile-combo' => 'Tablet Mobile Combo' ),
		array( 'tm-entypo-icon-tablet' => 'Tablet' ),
		array( 'tm-entypo-icon-tag' => 'Tag' ),
		array( 'tm-entypo-icon-text-document-inverted' => 'Text Document Inverted' ),
		array( 'tm-entypo-icon-text-document' => 'Text Document' ),
		array( 'tm-entypo-icon-text' => 'Text' ),
		array( 'tm-entypo-icon-thermometer' => 'Thermometer' ),
		array( 'tm-entypo-icon-thumbs-down' => 'Thumbs Down' ),
		array( 'tm-entypo-icon-thumbs-up' => 'Thumbs Up' ),
		array( 'tm-entypo-icon-thunder-cloud' => 'Thunder Cloud' ),
		array( 'tm-entypo-icon-ticket' => 'Ticket' ),
		array( 'tm-entypo-icon-time-slot' => 'Time Slot' ),
		array( 'tm-entypo-icon-tools' => 'Tools' ),
		array( 'tm-entypo-icon-traffic-cone' => 'Traffic Cone' ),
		array( 'tm-entypo-icon-trash' => 'Trash' ),
		array( 'tm-entypo-icon-tree' => 'Tree' ),
		array( 'tm-entypo-icon-triangle-down' => 'Triangle Down' ),
		array( 'tm-entypo-icon-triangle-left' => 'Triangle Left' ),
		array( 'tm-entypo-icon-triangle-right' => 'Triangle Right' ),
		array( 'tm-entypo-icon-triangle-up' => 'Triangle Up' ),
		array( 'tm-entypo-icon-trophy' => 'Trophy' ),
		array( 'tm-entypo-icon-tv' => 'Tv' ),
		array( 'tm-entypo-icon-typing' => 'Typing' ),
		array( 'tm-entypo-icon-uninstall' => 'Uninstall' ),
		array( 'tm-entypo-icon-unread' => 'Unread' ),
		array( 'tm-entypo-icon-untag' => 'Untag' ),
		array( 'tm-entypo-icon-upload-to-cloud' => 'Upload To Cloud' ),
		array( 'tm-entypo-icon-upload' => 'Upload' ),
		array( 'tm-entypo-icon-user' => 'User' ),
		array( 'tm-entypo-icon-users' => 'Users' ),
		array( 'tm-entypo-icon-v-card' => 'V Card' ),
		array( 'tm-entypo-icon-video-camera' => 'Video Camera' ),
		array( 'tm-entypo-icon-video' => 'Video' ),
		array( 'tm-entypo-icon-vinyl' => 'Vinyl' ),
		array( 'tm-entypo-icon-voicemail' => 'Voicemail' ),
		array( 'tm-entypo-icon-wallet' => 'Wallet' ),
		array( 'tm-entypo-icon-warning' => 'Warning' ),
		array( 'tm-entypo-icon-water' => 'Water' ),
		array( 'tm-entypo-icon-px-with-circle' => 'Px With Circle' ),
		array( 'tm-entypo-icon-px' => 'Px' ),
		array( 'tm-entypo-icon-app-store' => 'App Store' ),
		array( 'tm-entypo-icon-baidu' => 'Baidu' ),
		array( 'tm-entypo-icon-basecamp' => 'Basecamp' ),
		array( 'tm-entypo-icon-behance' => 'Behance' ),
		array( 'tm-entypo-icon-creative-cloud' => 'Creative Cloud' ),
		array( 'tm-entypo-icon-dribbble-with-circle' => 'Dribbble With Circle' ),
		array( 'tm-entypo-icon-dribbble' => 'Dribbble' ),
		array( 'tm-entypo-icon-dropbox' => 'Dropbox' ),
		array( 'tm-entypo-icon-evernote' => 'Evernote' ),
		array( 'tm-entypo-icon-facebook-with-circle' => 'Facebook With Circle' ),
		array( 'tm-entypo-icon-facebook' => 'Facebook' ),
		array( 'tm-entypo-icon-flattr' => 'Flattr' ),
		array( 'tm-entypo-icon-flickr-with-circle' => 'Flickr With Circle' ),
		array( 'tm-entypo-icon-flickr' => 'Flickr' ),
		array( 'tm-entypo-icon-foursquare' => 'Foursquare' ),
		array( 'tm-entypo-icon-github-with-circle' => 'Github With Circle' ),
		array( 'tm-entypo-icon-github' => 'Github' ),
		array( 'tm-entypo-icon-google-drive' => 'Google Drive' ),
		array( 'tm-entypo-icon-google-hangouts' => 'Google Hangouts' ),
		array( 'tm-entypo-icon-google-play' => 'Google Play' ),
		array( 'tm-entypo-icon-google-with-circle' => 'Google With Circle' ),
		array( 'tm-entypo-icon-google' => 'Google' ),
		array( 'tm-entypo-icon-grooveshark' => 'Grooveshark' ),
		array( 'tm-entypo-icon-houzz' => 'Houzz' ),
		array( 'tm-entypo-icon-icloud' => 'Icloud' ),
		array( 'tm-entypo-icon-instagram-with-circle' => 'Instagram With Circle' ),
		array( 'tm-entypo-icon-instagram' => 'Instagram' ),
		array( 'tm-entypo-icon-lastfm-with-circle' => 'Lastfm With Circle' ),
		array( 'tm-entypo-icon-lastfm' => 'Lastfm' ),
		array( 'tm-entypo-icon-linkedin-with-circle' => 'Linkedin With Circle' ),
		array( 'tm-entypo-icon-linkedin' => 'Linkedin' ),
		array( 'tm-entypo-icon-mail-with-circle' => 'Mail With Circle' ),
		array( 'tm-entypo-icon-medium-with-circle' => 'Medium With Circle' ),
		array( 'tm-entypo-icon-medium' => 'Medium' ),
		array( 'tm-entypo-icon-mixi' => 'Mixi' ),
		array( 'tm-entypo-icon-onedrive' => 'Onedrive' ),
		array( 'tm-entypo-icon-paypal' => 'Paypal' ),
		array( 'tm-entypo-icon-picasa' => 'Picasa' ),
		array( 'tm-entypo-icon-pinterest-with-circle' => 'Pinterest With Circle' ),
		array( 'tm-entypo-icon-pinterest' => 'Pinterest' ),
		array( 'tm-entypo-icon-qq-with-circle' => 'Qq With Circle' ),
		array( 'tm-entypo-icon-qq' => 'Qq' ),
		array( 'tm-entypo-icon-raft-with-circle' => 'Raft With Circle' ),
		array( 'tm-entypo-icon-raft' => 'Raft' ),
		array( 'tm-entypo-icon-rainbow' => 'Rainbow' ),
		array( 'tm-entypo-icon-rdio-with-circle' => 'Rdio With Circle' ),
		array( 'tm-entypo-icon-rdio' => 'Rdio' ),
		array( 'tm-entypo-icon-renren' => 'Renren' ),
		array( 'tm-entypo-icon-scribd' => 'Scribd' ),
		array( 'tm-entypo-icon-sina-weibo' => 'Sina Weibo' ),
		array( 'tm-entypo-icon-skype-with-circle' => 'Skype With Circle' ),
		array( 'tm-entypo-icon-skype' => 'Skype' ),
		array( 'tm-entypo-icon-slideshare' => 'Slideshare' ),
		array( 'tm-entypo-icon-smashing' => 'Smashing' ),
		array( 'tm-entypo-icon-soundcloud' => 'Soundcloud' ),
		array( 'tm-entypo-icon-spotify-with-circle' => 'Spotify With Circle' ),
		array( 'tm-entypo-icon-spotify' => 'Spotify' ),
		array( 'tm-entypo-icon-stumbleupon-with-circle' => 'Stumbleupon With Circle' ),
		array( 'tm-entypo-icon-stumbleupon' => 'Stumbleupon' ),
		array( 'tm-entypo-icon-swarm' => 'Swarm' ),
		array( 'tm-entypo-icon-tripadvisor' => 'Tripadvisor' ),
		array( 'tm-entypo-icon-tumblr-with-circle' => 'Tumblr With Circle' ),
		array( 'tm-entypo-icon-tumblr' => 'Tumblr' ),
		array( 'tm-entypo-icon-twitter-with-circle' => 'Twitter With Circle' ),
		array( 'tm-entypo-icon-twitter' => 'Twitter' ),
		array( 'tm-entypo-icon-vimeo-with-circle' => 'Vimeo With Circle' ),
		array( 'tm-entypo-icon-vimeo' => 'Vimeo' ),
		array( 'tm-entypo-icon-vine-with-circle' => 'Vine With Circle' ),
		array( 'tm-entypo-icon-vine' => 'Vine' ),
		array( 'tm-entypo-icon-vk-alternitive' => 'Vk Alternitive' ),
		array( 'tm-entypo-icon-vk-with-circle' => 'Vk With Circle' ),
		array( 'tm-entypo-icon-vk' => 'Vk' ),
		array( 'tm-entypo-icon-windows-store' => 'Windows Store' ),
		array( 'tm-entypo-icon-xing-with-circle' => 'Xing With Circle' ),
		array( 'tm-entypo-icon-xing' => 'Xing' ),
		array( 'tm-entypo-icon-yelp' => 'Yelp' ),
		array( 'tm-entypo-icon-youko-with-circle' => 'Youko With Circle' ),
		array( 'tm-entypo-icon-youko' => 'Youko' ),
		array( 'tm-entypo-icon-youtube-with-circle' => 'Youtube With Circle' ),
		array( 'tm-entypo-icon-youtube' => 'Youtube' ),
		);

	return array_merge( $icons, $entypo_icons );
}