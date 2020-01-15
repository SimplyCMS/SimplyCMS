<?php

namespace SimplyCMS\Parse\Twig\Extensions;

use Twig\Error\SyntaxError;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Class PageTokenParser
 *
 * @package SimplyCMS\Parse\Twig\Extensions
 */
class PageTokenParser extends AbstractTokenParser
{

    public function parse(Token $token)
    {
        $stream = $this->parser->getStream();
        $stream->expect(Token::BLOCK_END_TYPE);
        return new PageNode($token->getLine(), $this->getTag());
    }
    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'page';
    }
}
