# VHS Tags Dokuwiki plugin

Dokuwiki doesn't allow HTML directly in documents. We have a handful of blocks of code we want to be able to use around the website. E.g. embedding a map or calendar, or paypal and stripe buttons.

## syntax/subs.php

This handles straight substitutions. Wherever a tag appears in a dokuwiki file, a block of HTML will be output.

- `<VHS-MAP>` an embedded google map of the location of VHS
- `<VHS-CALENDAR>https://google-cal-url</VHS-CALENDAR>` an embedded google calendar
- `<VHS-PPBUTTON-MEMBER>` membership paypal button
- `<VHS-PPBUTTON-DONATE>` recurring donation paypal button
- `<VHS-PPBUTTON-DONATE-ONCE>` single donation paypal button
- `<VHS-SEARCH-BUTTON>` half of a search bar for the mikio theme. Appears as a magnifying glass button, when clicked the button goes away and the search input (below) appears.
- `<VHS-SEARCH-INPUT>` second half of the search bar code, this goes where you want the search field to appear.
- `<VHS-QR-BUTTON>` shows a button that runs a little js one-liner to show a QR code
- `<VHS-QR-CONTAINER>` Required for the button above to work, this is the container where the QR code appears (and the script tag that imports ./static/qrcode.js to make it all happen).

## Stripe tags:

- `<VHS-STRIPE-BUTTON>` starts a stripe button.
- `https://stripe-link/1234fooo|$75/month` specifies the URL and the title separated by a `|` pipe symbol.
- `</VHS-STRIPE-BUTTON>` closes the stripe button.

## TODO:

- Generalize things a bit more
    - `<VHS-MAP>` could be generalzed the way VHS-CALENDAR has been, tho we don't have a specific need for that.
- Submit to the dokuwiki registry, so we can manage it via dokuwiki's extension manager https://www.dokuwiki.org/devel:plugins#publishing_a_plugin_on_dokuwikiorg
- tests: https://www.dokuwiki.org/devel:unittesting


## QR Codes

This project uses the QR code library [qrcode.js by david shim](https://davidshimjs.github.io/qrcodejs/).

