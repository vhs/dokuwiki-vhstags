<?php
/**
 * VHS Tags plugin - substitutions.
 * By default dokuwiki doesn't allow html
 * you can enable it using plugins, but it creates a massive security hole
 * So here we replace tags like <VHSEVENTCAL> with a block of html
 * This file is for all the straight up substitutions, tags.php is for anything with a start and end tag.
 * 
 * @license    MIT
 * @author     Cory Alder <cory@vanhack.ca>
 */

const CALENDAR_HTML = <<<EOD
<object
  style="border: 0;"
  data="{{CALENDAR_URL}}"
  width="100%"
  height="600">
  <p></p>
</object>
EOD;

const STRIPE_BUTTON_HTML = <<<EOD
<a href="{{STRIPE_URL}}">
<button style="
    color: white;
    background: #625afa;
    border-radius: 8px;
    text-transform: uppercase;
    padding: 10px;
    letter-spacing: 1px;
    font-weight: 700;
    word-wrap: break-word;
    margin: 5px;
"> Pay with <img decoding="async" style="
    height: 1.7em;
    width: auto;
    vertical-align: middle;
" src="/_media/stripe-wordmark-white.svg"><br>
{{STRIPE_TITLE}}</button>
</a>
EOD;


const PAYPALBUTTONMEMBER_HTML = <<<EOD
<form
  action="https://www.paypal.com/cgi-bin/webscr"
  method="post"
  target="_top">

  <input name="cmd" type="hidden" value="_s-xclick">
  <input name="hosted_button_id" type="hidden" value="6YYJ3GVXZLZHC">
  <input name="on0" type="hidden" value="">
  <select name="os0" style="width: 15em">
    <option value="Keyholder + Donation(15)">Keyholder: $75.00 CAD – monthly</option>
    <option value="Keyholder + Donation(25)">Keyholder + Donation($10) : $85.00 CAD – monthly</option>
  </select>
  <input name="currency_code" type="hidden" value="CAD">
  <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" type="image">
  <img decoding="async" style="display: none; border: 0; height: 1px; width: 1px;" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="">
  </form>
EOD;

const PAYPAYBUTTONDONATE_HTML = <<<EOD
<form style="margin: 0px;" action="https://www.paypal.com/cgi-bin/webscr" method="post"><input name="cmd" type="hidden" value="_s-xclick">
  <input name="hosted_button_id" type="hidden" value="3JMGGSBMSTQXN">
  <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/btn/btn_subscribeCC_LG.gif" type="image">
  <img decoding="async" style="display: none; border: 0; height: 1px; width: 1px;" hidden="" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" alt="">
</form>
EOD;

const PAYPAYBUTTONDONATEONCE_HTML = <<<EOD
<form style="margin: 0px;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input name="cmd" type="hidden" value="_donations">
  <input name="business" type="hidden" value="money@vanhack.ca">
  <input name="item_name" type="hidden" value="Vancouver Hack Space">
  <input name="no_note" type="hidden" value="0">
  <input name="currency_code" type="hidden" value="CAD">
  <input name="bn" type="hidden" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
  <input name="sra" type="hidden" value="1">
  <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" type="image">
  <img decoding="async" style="display: none; border: 0; height: 1px; width: 1px;" hidden="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="">
</form>
EOD;

const LOCATIONMAP_HTML = <<<EOD
<iframe style="border: 0;" src="https://www.google.com/maps/embed/v1/place?q=Vancouver+Hack+Space,+Venables+Street,+Vancouver,+BC,+Canada&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
EOD;

const SEARCH_BUTTON_HTML = '<a id="navBarSearchReveal" onclick="document.getElementById(\'navBarSearchInput\').style.display=\'\'; this.style.display = \'none\'; return true;"><svg xmlns="http://www.w3.org/2000/svg" class="mikio-iicon" viewBox="0 0 32 32" aria-hidden="true" style="fill:currentColor"><path d="M27 24.57l-5.647-5.648a8.895 8.895 0 0 0 1.522-4.984C22.875 9.01 18.867 5 13.938 5 9.01 5 5 9.01 5 13.938c0 4.929 4.01 8.938 8.938 8.938a8.887 8.887 0 0 0 4.984-1.522L24.568 27 27 24.57zm-13.062-4.445a6.194 6.194 0 0 1-6.188-6.188 6.195 6.195 0 0 1 6.188-6.188 6.195 6.195 0 0 1 6.188 6.188 6.195 6.195 0 0 1-6.188 6.188z"></path></svg></a>';

const SEARCH_INPUT_HTML = <<<EOD
<div id="navBarSearchInput" style="display: none;">
<form action="/start" method="get" role="search" class="search doku_form mikio-search" id="dw__nav__search" accept-charset="utf-8" style="display: block; margin: 0.5rem;"><input type="hidden" name="do" value="search">
<input name="q" type="text" class="edit search_typeahead" title="[F]" accesskey="f" placeholder="Search" autocomplete="on" id="navsearch__in" value="" style="max-width:300px;">
<button value="1" type="submit" title="Search">
<svg xmlns="http://www.w3.org/2000/svg" class="mikio-iicon" viewBox="0 0 32 32" aria-hidden="true" style="fill:currentColor">
<path d="M27 24.57l-5.647-5.648a8.895 8.895 0 0 0 1.522-4.984C22.875 9.01 18.867 5 13.938 5 9.01 5 5 9.01 5 13.938c0 4.929 4.01 8.938 8.938 8.938a8.887 8.887 0 0 0 4.984-1.522L24.568 27 27 24.57zm-13.062-4.445a6.194 6.194 0 0 1-6.188-6.188 6.195 6.195 0 0 1 6.188-6.188 6.195 6.195 0 0 1 6.188 6.188 6.195 6.195 0 0 1-6.188 6.188z"></path>
</svg>
</button>
</form>
<div id="navsearch__out" class="ajax_qsearch JSpopup">
</div>
</div>
EOD;

const QRCODE_BUTTON_HTML = <<<EOD
<a title="generate a qr code that links to this page" onclick="let foo = (document.qrcode ?? (document.qrcode = new QRCode(document.getElementById('qrcode')))); foo.clear(); foo.makeCode(window.location+'');">QR Code</a>
EOD;

const QRCODE_CONTAINER_HTML = <<<EOD
<script src="/lib/plugins/vhstags/static/qrcode.js"></script>
<div id="qrcode"></div>
EOD;

const CALENDAR_REGEX_PATTERN = "<VHS-CALENDAR>.*?</VHS-CALENDAR>";
const STRIPE_REGEX_PATTERN = "<VHS-STRIP-BUTTON>.*?</VHS-STRIP-BUTTON>";


enum TagMatches: string {
  case LocationMap = "<VHS-MAP>";
  case StripeButton = "<VHS-STRIPE-BUTTON>";
  case PPButtonMember = "<VHS-PPBUTTON-MEMBER>";
  case PPButtonDonate = "<VHS-PPBUTTON-DONATE>";
  case PPButtonDonateOnce = "<VHS-PPBUTTON-DONATE-ONCE>";
  case SearchButton = "<VHS-SEARCH-BUTTON>";
  case SearchInput = "<VHS-SEARCH-INPUT>";
  case QRButton = "<VHS-QR-BUTTON>";
  case QRContainer = "<VHS-QR-CONTAINER>";
  case Calendar = "<VHS-CALENDAR>";

  public function html($match): string {
    switch ($this) {
      case TagMatches::PPButtonMember:
        return PAYPALBUTTONMEMBER_HTML;
      case TagMatches::PPButtonDonate:
        return PAYPAYBUTTONDONATE_HTML;
      case TagMatches::PPButtonDonateOnce:
        return PAYPAYBUTTONDONATEONCE_HTML;
      case TagMatches::LocationMap;
        return LOCATIONMAP_HTML;
      case TagMatches::SearchButton;
        return SEARCH_BUTTON_HTML;
      case TagMatches::SearchInput;
        return SEARCH_INPUT_HTML;
      case TagMatches::QRButton;
        return QRCODE_BUTTON_HTML;
      case TagMatches::QRContainer;
        return QRCODE_CONTAINER_HTML;
      case TagMatches::Calendar;
        // substr to trim off <VHS-CALENDAR> (14 chars) and </VHS-CALENDAR> (15 chars)
        $calendarUrl = substr($match, 14, -15);
        return str_replace("{{CALENDAR_URL}}", $calendarUrl, CALENDAR_HTML);
      case TagMatches::StripeButton:
        // substr to trim off <VHS-STRIPE-BUTTON> (19 chars) and </VHS-STRIPE-BUTTON> (20 chars)
        $innerText = substr($match, 19, -20);
        $parts = explode("|", $innerText);
        if (count($parts) != 2) {
          return "Invalid Stripe Button Tag";
        }
        $url = $parts[0];
        $title = $parts[1];
        $html_with_url = str_replace("{{STRIPE_URL}}", $url, STRIPE_BUTTON_HTML);
        $html_with_url_and_title = str_replace("{{STRIPE_TITLE}}", $title, $html_with_url);
        return $html_with_url_and_title;
      default:
        return "";
    }
  }
}

class syntax_plugin_vhstags_subs extends DokuWiki_Syntax_Plugin {

  function getType(): string {
    return 'substition';
  }

  function getPType(): string {
    return 'normal'; // or "block" depending on if we want paragraphs closed
  }

  function getSort():int {
    return 999;
  }

  function connectTo($mode): void {
    $this->Lexer->addSpecialPattern(CALENDAR_REGEX_PATTERN, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(STRIPE_REGEX_PATTERN, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::PPButtonMember->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::PPButtonDonate->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::PPButtonDonateOnce->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::LocationMap->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::SearchButton->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::SearchInput->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::QRButton->value, $mode, 'plugin_vhstags_subs');
    $this->Lexer->addSpecialPattern(TagMatches::QRContainer->value, $mode, 'plugin_vhstags_subs');
  }

  function handle($match, $state, $pos, Doku_Handler $handler): array {
    switch ($state) {
      case DOKU_LEXER_ENTER:
        break;
      case DOKU_LEXER_MATCHED:
        break;
      case DOKU_LEXER_UNMATCHED:
        break;
      case DOKU_LEXER_EXIT:
        break;
      case DOKU_LEXER_SPECIAL:
        break;
    }

    return [
      'match' => $match,
      'state' => $state
    ];
  }

  function render($mode, Doku_Renderer $renderer, $data): bool {
    if ($mode !== 'xhtml') return false;

    if ($data['state'] !== DOKU_LEXER_SPECIAL) return false;

    $tagMatch = null;
    // we need a special case for calendar because
    // $data['match'] will include variable data inside the tags
    if (str_starts_with($data['match'], TagMatches::Calendar->value)) {
      $tagMatch = TagMatches::Calendar;
    } else if (str_starts_with($data['match'], TagMatches::StripeButton->value)) {
      $tagMatch = TagMatches::StripeButton;
    } else {
      $tagMatch = TagMatches::from(value: $data["match"]);
    }

    $renderer->doc .= $tagMatch->html($data['match']);
    return true;
  }
}