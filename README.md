# VHS Tags Dokuwiki plugin

Dokuwiki doesn't allow HTML directly in documents. We have a handful of blocks of code we want to be able to use around the website. E.g. embedding a map or calendar, or paypal and stripe buttons.

## syntax/subs.php

This handles straight substitutions. Wherever a tag appears in a dokuwiki file, a block of HTML will be output.

- `<VHS-MAP>` an embedded google map of the location of VHS
- `<VHS-EVENTCAL>` an embedded google calendar
- `<VHS-PPBUTTON-MEMBER>` membership paypal button
- `<VHS-PPBUTTON-DONATE>` recurring donation paypal button
- `<VHS-PPBUTTON-DONATE-ONCE>` single donation paypal button
- `<VHS-SEARCH-BUTTON>` half of a search bar for the mikio theme. Appears as a magnifying glass button, when clicked the button goes away and the search input (below) appears.
- `<VHS-SEARCH-INPUT>` second half of the search bar code, this goes where you want the search field to appear.
- `<VHS-QR-BUTTON>` shows a button that runs a little js one-liner to show a QR code
- `<VHS-QR-CONTAINER>` Required for the button above to work, this is the container where the QR code appears (and the script tag that imports ./static/qrcode.js to make it all happen).

## syntax/stripe.php

This handles the more complex case of the stripe buttons, these need an opening and closing tag, and the data in between the tags needs to be parsed.

- `<VHS-STRIPE-BUTTON>` starts a stripe button.
- `https://stripe-link/1234fooo|$75/month` specifies the URL and the title separated by a `|` pipe symbol.
- `</VHS-STRIPE-BUTTON>` closes the stripe button.

## TODO:

- Generalize things a bit more
    - specifically, the `<VHS-EVENTCAL>` tag should become a complex tag, like: `<VHS-GOOGLE-CAL>https://calendar-url/</VHS-GOOGLE-CAL>`
    - `<VHS-MAP>` could be similarly generalzed, tho we don't have a specific need for that.
- Submit to the dokuwiki registry, so we can manage it via dokuwiki's extension manager https://www.dokuwiki.org/devel:plugins#publishing_a_plugin_on_dokuwikiorg


## QR Codes

This project uses the QR code library [qrcode.js by david shim](https://davidshimjs.github.io/qrcodejs/).

