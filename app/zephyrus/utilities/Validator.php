<?php namespace Zephyrus\Utilities;

class Validator
{
    const PASSWORD_COMPLIANT = ['Zephyrus\Utilities\Validator', 'isNotEmpty'];
    const NOT_EMPTY = ['Zephyrus\Utilities\Validator', 'isNotEmpty'];
    const DECIMAL = ['Zephyrus\Utilities\Validator', 'isDecimal'];
    const DECIMAL_SIGNED = ['Zephyrus\Utilities\Validator', 'isSignedDecimal'];
    const INTEGER = ['Zephyrus\Utilities\Validator', 'isInteger'];
    const INTEGER_SIGNED = ['Zephyrus\Utilities\Validator', 'isSignedInteger'];
    const EMAIL = ['Zephyrus\Utilities\Validator', 'isEmail'];
    const DATE_ISO = ['Zephyrus\Utilities\Validator', 'isDate'];
    const ALPHANUMERIC = ['Zephyrus\Utilities\Validator', 'isAlphanumeric'];
    const URL = ['Zephyrus\Utilities\Validator', 'isUrl'];
    const URL_STRICT = ['Zephyrus\Utilities\Validator', 'isStrictUrl'];
    const URL_YOUTUBE = ['Zephyrus\Utilities\Validator', 'isYoutubeUrl'];
    const PHONE = ['Zephyrus\Utilities\Validator', 'isPhone'];
    const UPLOAD = ['Zephyrus\Utilities\Validator', 'isValidUpload'];

    /**
     * @param array $data
     * @return bool
     */
    public static function isValidUpload($data)
    {
        return (is_array($data) && $data['error'] > UPLOAD_ERR_OK);
    }

    /**
     * @param string $data
     * @return boolean
     */
    public static function isNotEmpty($data)
    {
        return !empty(trim($data));
    }

    public static function isDecimal($data)
    {
        return self::isRegexValid($data, "[0-9]+(\.[0-9]+)?");
    }

    public static function isInteger($data)
    {
        return self::isRegexValid($data, "[0-9]+");
    }

    public static function isSignedDecimal($data)
    {
        return self::isRegexValid($data, "-?[0-9]+(\.[0-9]+)?");
    }

    public static function isSignedInteger($data)
    {
        return self::isRegexValid($data, "-?[0-9]+");
    }

    public static function isAlphanumeric($data)
    {
        return preg_match('/^[a-zA-Z0-9]+$/', $data);
    }

    public static function isPasswordCompliant($data)
    {
        $uppercase = preg_match('@[A-Z]@', $data);
        $lowercase = preg_match('@[a-z]@', $data);
        $number = preg_match('@[0-9]@', $data);
        return strlen($data) >= 8 && $uppercase && $lowercase && $number;
    }

    public static function isDate($data)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $data);
        return $d && $d->format('Y-m-d') == $data;
    }

    public static function isEmail($data)
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    public static function isRegexValid($data, $regex)
    {
        return preg_match('/^' . $regex . '$/', $data);
    }

    /**
     * Based on the North American Numbering Plan (NAPN).
     *
     * @see https://en.wikipedia.org/wiki/North_American_Numbering_Plan#Numbering_system
     */
    public static function isPhone($data)
    {
        return self::isRegexValid($data, "([\(\+])?([0-9]{1,3}([\s])?)?([\+|\(|\-|\)|\s])?([0-9]{2,4})([\-|\)|\.|\s]([\s])?)?([0-9]{2,4})?([\.|\-|\s])?([0-9]{4,8})");
    }

    public static function isUrl($data)
    {
        return self::isRegexValid($data, "(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\\\".,<>?«»“”‘’]))");
    }

    /**
     * Force protocol.
     *
     * @param string $data
     * @return int
     */
    public static function isStrictUrl($data)
    {
        return self::isRegexValid($data, "(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\\\".,<>?«»“”‘’]))");
    }

    /**
     * @param string $data
     * @return bool
     */
    public static function isYoutubeUrl($data)
    {
        $parts = parse_url($data);
        if ($parts['scheme'] != 'http' && $parts['scheme'] != 'https') {
            return false;
        }

        if (strpos($parts['host'], 'youtu.be') !== false) {
            if (!empty($parts['path'])) {
                return true;
            }
        } elseif (strpos($parts['host'], 'youtube.com') !== false) {
            if (strpos($parts['path'], '/v/') !== false) {
                return true;
            } elseif (strpos($parts['path'], '/embed/') !== false) {
                return true;
            } elseif ($parts['path'] == "/watch" && strpos($parts['query'], 'v=') !== false) {
                return true;
            }
            return false;
        }

        return false;
    }
}