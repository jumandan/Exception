<?php
namespace JumandanException;

class Exception extends \RuntimeException
{
    /** @var null $edata Additional state of Exception */
    protected $edata = null;

    /**
     * @param string $message A brief message.
     * @param array $edata Additional state.
     */
    public function __construct(string $message, array $edata = null)
    {
        parent::__construct($message, 0, null);
        $this->edata = $edata;
    }

    /**
     * It gets string representation of Exception.
     * @param \Exception $e An Exception.
     */
    public static function asString(\Exception $e): string
    {
        $edata = null;
        if ($e instanceof self) {
            $edata = var_export($e->edata, true);
        }
        return sprintf(
            "%s\nClass '%s': %s in %s:%d\nEdata: %s\nStack Trace:\n%s\n",
            sprintf("[%s]", date("Y-m-d H:i:s P")),
            get_class($e),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $edata,
            $e->getTraceAsString()
        );
    }

    public function __toString(): string
    {
        return self::asString($this);
    }
}
