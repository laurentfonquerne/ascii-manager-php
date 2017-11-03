<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Symbols
 *
 * @ORM\Table(name="symbols")
 * @ORM\Entity
 */
class Symbols
{
    /**
     * @var string
     *
     * @ORM\Column(name="symbols_name", type="string", length=32, nullable=false)
     */
    private $symbolsName;

    /**
     * @var string
     *
     * @ORM\Column(name="symbols_type", type="string", length=1, nullable=false)
     */
    private $symbolsType;

    /**
     * @var string
     *
     * @ORM\Column(name="symbols_value", type="string", length=1, nullable=false)
     */
    private $symbolsValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="symbols_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $symbolsId;



    /**
     * Set symbolsName
     *
     * @param string $symbolsName
     *
     * @return Symbols
     */
    public function setSymbolsName($symbolsName)
    {
        $this->symbolsName = $symbolsName;

        return $this;
    }

    /**
     * Get symbolsName
     *
     * @return string
     */
    public function getSymbolsName()
    {
        return $this->symbolsName;
    }

    /**
     * Set symbolsType
     *
     * @param string $symbolsType
     *
     * @return Symbols
     */
    public function setSymbolsType($symbolsType)
    {
        $this->symbolsType = $symbolsType;

        return $this;
    }

    /**
     * Get symbolsType
     *
     * @return string
     */
    public function getSymbolsType()
    {
        return $this->symbolsType;
    }

    /**
     * Set symbolsValue
     *
     * @param string $symbolsValue
     *
     * @return Symbols
     */
    public function setSymbolsValue($symbolsValue)
    {
        $this->symbolsValue = $symbolsValue;

        return $this;
    }

    /**
     * Get symbolsValue
     *
     * @return string
     */
    public function getSymbolsValue()
    {
        return $this->symbolsValue;
    }

    /**
     * Get symbolsId
     *
     * @return integer
     */
    public function getSymbolsId()
    {
        return $this->symbolsId;
    }
}
