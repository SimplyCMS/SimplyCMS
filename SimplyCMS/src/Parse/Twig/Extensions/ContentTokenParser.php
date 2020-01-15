<?php


namespace SimplyCMS\Parse\Twig\Extensions;


use Twig\Token;

class ContentTokenParser extends \Twig\TokenParser\AbstractTokenParser
{
    public function parse(\Twig\Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $file = $parser->getExpressionParser()->parseExpression();
        $stream->expect(\Twig\Token::BLOCK_END_TYPE);

        return new ContentNode("", $file, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'content';
    }
}
