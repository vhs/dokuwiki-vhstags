<?php
/**
 * VHS Tags plugin - tags
 * By default dokuwiki doesn't allow html,
 * and html is required to make the fancy stripe buttons on the membership page
 * so this code replaces <VHS-STRIPE-BUTTON>http://aURL|a title</VHS-STRIPE-BUTTON>
 * With a button titled "PAY WITH STRIPE a title" that links to uURL.
 *
 * @license    MIT
 * @author     Cory Alder <cory@vanhack.ca>
 */

const STRIPE_BUTTON_HTML = <<<EOD
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
EOD;


class syntax_plugin_vhstags_stripe extends DokuWiki_Syntax_plugin {
  function getType(): string {
    return 'protected';
  }

  function getPType(): string {
    return 'normal';
  }

  function getSort(): int {
    return 159;
  }

  function connectTo($mode) { $this->Lexer->addEntryPattern('<VHS-STRIPE-BUTTON>(?=.*?</VHS-STRIPE-BUTTON>)',$mode,'plugin_vhstags_stripe'); }
  function postConnect() { $this->Lexer->addExitPattern('</VHS-STRIPE-BUTTON>','plugin_vhstags_stripe'); }

  function handle($match, $state, $pos, Doku_Handler $handler): array {
    switch ($state) {
    case DOKU_LEXER_ENTER:
        return array($state, $match);
        break;
      case DOKU_LEXER_MATCHED:
        break;
      case DOKU_LEXER_UNMATCHED:
        return array($state, $match);
        break;
      case DOKU_LEXER_EXIT:
        return array($state, $match);
        break;
      case DOKU_LEXER_SPECIAL:
        break;
    }
    return array();
  }

  function render($mode, Doku_Renderer $renderer, $data): bool {
        if ($mode == 'xhtml') {
                list($state,$match) = $data;

                switch ($state) {
                case DOKU_LEXER_ENTER:
                        break;
                case DOKU_LEXER_UNMATCHED:
                        $parts = explode("|", $match);
                        $urlPart = $parts[0];
                        $titlePart = $parts[1];
                        $renderer->doc .= '<a href="' . $urlPart . '">' . STRIPE_BUTTON_HTML . $titlePart;
                        break;
                case DOKU_LEXER_EXIT:
                        $renderer->doc .= '</button></a>';
                        break;
                }
                return true;
        }
        return false;
  }
}

?>