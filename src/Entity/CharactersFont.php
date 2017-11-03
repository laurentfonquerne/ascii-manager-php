<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CharactersFont
 *
 * @ORM\Table(name="characters_font")
 * @ORM\Entity
 */
class CharactersFont
{
    /**
     * @var integer
     *
     * @ORM\Column(name="font_id", type="integer", nullable=false)
     */
    private $fontId;

    /**
     * @var integer
     *
     * @ORM\Column(name="characters_id", type="integer", nullable=false)
     */
    private $charactersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="characters_font_width", type="integer", nullable=false)
     */
    private $charactersFontWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="characters_font_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charactersFontId;



    /**
     * Set fontId
     *
     * @param integer $fontId
     *
     * @return CharactersFont
     */
    public function setFontId($fontId)
    {
        $this->fontId = $fontId;

        return $this;
    }

    /**
     * Get fontId
     *
     * @return integer
     */
    public function getFontId()
    {
        return $this->fontId;
    }

    /**
     * Set charactersId
     *
     * @param integer $charactersId
     *
     * @return CharactersFont
     */
    public function setCharactersId($charactersId)
    {
        $this->charactersId = $charactersId;

        return $this;
    }

    /**
     * Get charactersId
     *
     * @return integer
     */
    public function getCharactersId()
    {
        return $this->charactersId;
    }

    /**
     * Set charactersFontWidth
     *
     * @param integer $charactersFontWidth
     *
     * @return CharactersFont
     */
    public function setCharactersFontWidth($charactersFontWidth)
    {
        $this->charactersFontWidth = $charactersFontWidth;

        return $this;
    }

    /**
     * Get charactersFontWidth
     *
     * @return integer
     */
    public function getCharactersFontWidth()
    {
        return $this->charactersFontWidth;
    }

    /**
     * Get charactersFontId
     *
     * @return integer
     */
    public function getCharactersFontId()
    {
        return $this->charactersFontId;
    }
}
