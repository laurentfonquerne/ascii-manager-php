<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Font
 *
 * @ORM\Table(name="font", uniqueConstraints={@ORM\UniqueConstraint(name="font_name", columns={"font_name"})})
 * @ORM\Entity
 */
class Font
{
    /**
     * @var string
     *
     * @ORM\Column(name="font_name", type="string", length=32, nullable=false)
     */
    private $fontName;

    /**
     * @var integer
     *
     * @ORM\Column(name="font_line_height", type="integer", nullable=false)
     */
    private $fontLineHeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="font_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fontId;



    /**
     * Set fontName
     *
     * @param string $fontName
     *
     * @return Font
     */
    public function setFontName($fontName)
    {
        $this->fontName = $fontName;

        return $this;
    }

    /**
     * Get fontName
     *
     * @return string
     */
    public function getFontName()
    {
        return $this->fontName;
    }

    /**
     * Set fontLineHeight
     *
     * @param integer $fontLineHeight
     *
     * @return Font
     */
    public function setFontLineHeight($fontLineHeight)
    {
        $this->fontLineHeight = $fontLineHeight;

        return $this;
    }

    /**
     * Get fontLineHeight
     *
     * @return integer
     */
    public function getFontLineHeight()
    {
        return $this->fontLineHeight;
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
}
