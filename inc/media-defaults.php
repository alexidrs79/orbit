<?php
/**
 * Default media-library filename stems for decorative icons/illustrations
 * used via `orbit_print_icon()` (see theme-setup.php).
 *
 * Written as filename stems (e.g. "orbit-logo"), not numeric attachment
 * IDs — a numeric ID is only valid on the exact install it was captured
 * against. See `orbit_get_attachment_id_by_filename()`.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ---- Header / Footer ----
define( 'ORBIT_LOGO_ID', 'orbit-logo' );

// ---- Hero ----
define( 'ORBIT_HERO_ANNOUNCE_ARROW_ID', 'hero-announce-arrow' );
define( 'ORBIT_HERO_TAB_OMNICHANNEL_ID', 'hero-tab-omnichannel' );

// ---- Why Orbit ----
define( 'ORBIT_WHY_ICON_CHANNEL_ID', 'why-orbit-icon-channel' );
define( 'ORBIT_WHY_ICON_NETWORK_ID', 'why-orbit-icon-network' );
define( 'ORBIT_WHY_ICON_AGENTS_ID', 'why-orbit-icon-agents' );
define( 'ORBIT_WHY_ICON_GOLIVE_ID', 'why-orbit-icon-golive' );

// ---- Compliance ----
define( 'ORBIT_COMPLIANCE_SOC_ID', 'compliance-badge-soc' );
define( 'ORBIT_COMPLIANCE_GDPR_ID', 'compliance-badge-gdpr' );
define( 'ORBIT_COMPLIANCE_CCPA_ID', 'compliance-badge-ccpa' );
define( 'ORBIT_COMPLIANCE_ISO_ID', 'compliance-badge-iso' );
define( 'ORBIT_COMPLIANCE_PCI_ID', 'compliance-badge-pci' );
define( 'ORBIT_COMPLIANCE_HIPAA_ID', 'compliance-badge-hipaa' );

// ---- Channels ----
define( 'ORBIT_CHANNEL_SMS_ID', 'channel-icon-sms' );
define( 'ORBIT_CHANNEL_VOICE_ID', 'channel-icon-voice' );
define( 'ORBIT_CHANNEL_VIDEO_ID', 'channel-icon-video' );
define( 'ORBIT_CHANNEL_WHATSAPP_ID', 'channel-icon-whatsapp' );
define( 'ORBIT_CHANNEL_RCS_ID', 'channel-icon-rcs' );
define( 'ORBIT_CHANNEL_APPLE_ID', 'channel-icon-apple' );
define( 'ORBIT_CHANNEL_EMAIL_ID', 'channel-icon-email' );
define( 'ORBIT_CHANNEL_LINE_ID', 'channel-icon-line' );
define( 'ORBIT_CHANNEL_VIBER_ID', 'channel-icon-viber' );
define( 'ORBIT_CHANNEL_TELEGRAM_ID', 'channel-icon-telegram' );
define( 'ORBIT_CHANNEL_INSTAGRAM_ID', 'channel-icon-instagram' );
define( 'ORBIT_CHANNEL_MESSENGER_ID', 'channel-icon-messenger' );
define( 'ORBIT_CHANNEL_FAX_ID', 'channel-icon-fax' );
define( 'ORBIT_CHANNEL_PUSH_ID', 'channel-icon-push' );
define( 'ORBIT_CHANNELS_CHAT_PHOTO_ID', 'channels-chat-photo' );
define( 'ORBIT_CHANNELS_CHAT_AVATAR_ID', 'channels-chat-avatar' );

// ---- Channel hub ----
define( 'ORBIT_HUB_CHAT_AVATAR_ID', 'hub-chat-avatar' );
define( 'ORBIT_HUB_WASH_ID', 'hub-section-glow' );

// ---- One API ----
define( 'ORBIT_API_ICON_ONE_ID', 'api-icon-one' );
define( 'ORBIT_API_ICON_DOCS_ID', 'api-icon-docs' );
define( 'ORBIT_API_ICON_FLOWS_ID', 'api-icon-flows' );
define( 'ORBIT_API_ICON_JOURNEY_ID', 'api-icon-journey' );
define( 'ORBIT_API_ICON_INSIGHTS_ID', 'api-icon-insights' );
define( 'ORBIT_API_ICON_WEBHOOKS_ID', 'api-icon-webhooks' );

// ---- Voice transcript ----
define( 'ORBIT_VOICE_PHOTO_ID', 'voice-transcript-photo' );
define( 'ORBIT_VOICE_AVATAR_ID', 'voice-transcript-avatar' );
define( 'ORBIT_VOICE_ICON_TRANSCRIPT_ID', 'voice-icon-transcript' );
define( 'ORBIT_VOICE_ICON_RECORD_ID', 'voice-icon-record' );
define( 'ORBIT_VOICE_ICON_MUTE_ID', 'voice-icon-mute' );
define( 'ORBIT_VOICE_ICON_PAUSE_ID', 'voice-icon-pause' );
define( 'ORBIT_VOICE_ICON_KEYPAD_ID', 'voice-icon-keypad' );
define( 'ORBIT_VOICE_ICON_MORE_ID', 'voice-icon-more' );

// ---- Voice stack ----
define( 'ORBIT_VSTACK_ICON_STT_ID', 'voice-stack-icon-stt' );
define( 'ORBIT_VSTACK_ICON_TTS_ID', 'voice-stack-icon-tts' );
define( 'ORBIT_VSTACK_ICON_MODEL_ID', 'voice-stack-icon-model' );
define( 'ORBIT_VSTACK_ICON_SIP_ID', 'voice-stack-icon-sip' );
define( 'ORBIT_VSTACK_ICON_RECORD_ID', 'voice-stack-icon-record' );
define( 'ORBIT_VSTACK_ICON_WATCHDOG_ID', 'voice-stack-icon-watchdog' );
define( 'ORBIT_VSTACK_ICON_SFU_ID', 'voice-stack-icon-sfu' );
define( 'ORBIT_VSTACK_ICON_TURN_ID', 'voice-stack-icon-turn' );

// ---- Channel memory ----
define( 'ORBIT_MEMORY_PHOTO_A_ID', 'Every-channel-your-customer-uses' );
define( 'ORBIT_MEMORY_PHOTO_B_ID', 'Your-customer-already-switched-channels' );
define( 'ORBIT_MEMORY_GLOW_LEFT_ID', 'memory-glow-left' );
define( 'ORBIT_MEMORY_GLOW_RIGHT_ID', 'memory-glow-right' );

// ---- Commerce (conversational commerce visual) ----
define( 'ORBIT_COMMERCE_VISUAL_ID', 'commerce-thread-visual' );

// ---- CCaaS (agent workspace) ----
define( 'ORBIT_CCAAS_HERO_PHOTO_ID', 'ccaas-hero-photo' );
define( 'ORBIT_CCAAS_AVATAR_ID', 'ccaas-avatar' );

// ---- Why switch (never blindsided) ----
define( 'ORBIT_WHYSWITCH_IMAGE_ID', 'whyswitch-dashboard' );

// ---- Supervisor ----
define( 'ORBIT_SUPERVISOR_PHOTO_ID', 'supervisor-photo' );
define( 'ORBIT_SUPERVISOR_ALEX_ID', 'supervisor-alex' );
define( 'ORBIT_SUPERVISOR_TAYLOR_ID', 'supervisor-taylor' );

// ---- Network CTA ----
define( 'ORBIT_NCTA_GLOBE_ID', 'network-cta-globe' );

// ---- Developers ----
define( 'ORBIT_DEV_PATTERN_ID', 'developers-binary-pattern' );

// ---- Pricing ----
define( 'ORBIT_PRICE_ICON_SMS_ID', 'pricing-icon-sms' );
define( 'ORBIT_PRICE_ICON_WHATSAPP_ID', 'pricing-icon-whatsapp' );
define( 'ORBIT_PRICE_ICON_VOICE_OUT_ID', 'pricing-icon-voice-out' );
define( 'ORBIT_PRICE_ICON_VOICE_IN_ID', 'pricing-icon-voice-in' );
define( 'ORBIT_PRICE_ICON_VIDEO_ID', 'pricing-icon-video' );
define( 'ORBIT_PRICE_ICON_NUMBER_ID', 'pricing-icon-number' );
define( 'ORBIT_PRICE_ICON_AI_ID', 'pricing-icon-ai' );
define( 'ORBIT_PRICE_ICON_RECORD_ID', 'pricing-icon-record' );

// ---- Integrations (SVG diagram parts; no soft composite PNG) ----
define( 'ORBIT_INT_DOTS_ID', 'int-dots' );
define( 'ORBIT_INT_ORBIT_MARK_ID', 'int-orbit-mark' );

// ---- Closing + footer (1:5947) ----
define( 'ORBIT_CLOSE_BLUE_HUE_ID', 'close-blue-hue' );
define( 'ORBIT_CLOSE_HORIZON_ID', 'close-horizon' );
define( 'ORBIT_CLOSE_FOOTER_LOGO_ID', 'close-footer-logo' );
