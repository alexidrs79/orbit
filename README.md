# orbit

Landing-page theme for **Orbit**, Devotel's unified omnichannel CPaaS/CCaaS platform. Live at `orbit.devotel.io`.

The page is a stack of sections under `template-parts/` — hero, why-orbit, compliance, channels grid/API/hub, voice transcript/stack/compare, channel memory, CDP, commerce, voice, verify, journeys, phone system, CX orbit, CCaaS, NaaS, CSPaaS, why-switch, CPaaS, architecture, supervisor, network CTA, developers, pricing, integrations, and closing — pulled in by `page-templates/template-landing-orbit.php` in order. Each part reads its own ACF field group from `inc/`; there's no content logic in the template itself.

- Design source of truth: Figma file `p3WnusZf5AbFXCnDlpazsp`, node `1:60` ("Orbit"). Design tokens are defined at the top of `style.css`.
- Decorative icons/images live in the Media Library and are looked up by filename stem (e.g. `orbit-logo`, `why-orbit-icon-channel`) via `orbit_print_icon()` — see `inc/media-defaults.php` and `theme-setup.php`. Numeric attachment IDs are avoided since they're only valid on the install they were captured against.
- Theme-wide values (favicon, taglines, etc.) live under **Theme Settings**, added via ACF options page in `inc/acf-fields-theme-settings.php`. Saving the favicon there mirrors it into WordPress's own `site_icon` option so it actually renders.
- SVG uploads are allowed through the Media Library for admins only, needed for the vector wordmark logo.
- The theme slug matches an existing theme of the same name on WordPress.org; `functions.php`/`theme-setup.php` blocks that directory's update notice so it can't silently overwrite this theme.

## Requirements

- WordPress 6.2 or newer, PHP 8.0 or newer
- Advanced Custom Fields **Pro** — every section's content, and Theme Settings, is driven by ACF Pro field groups (repeaters, options pages) registered in `inc/`.

## Installing

Copy or symlink this folder into `wp-content/themes/` and activate it. Create a page and assign the **Orbit Landing** page template. Section content is filled in on the page itself, with site-wide values under **Theme Settings**.

## Deploys

There is no automated deploy. Code and content go live manually — a change that works locally is not live until it is copied up, and the database side (ACF values, Media Library items) has to be reproduced on the target install by hand. Use the filename-stem media lookups for anything new; a numeric attachment ID only works on the install it was captured against.
