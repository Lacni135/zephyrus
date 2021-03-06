<?php namespace Zephyrus\Utilities\Validations;

interface ValidationCallback
{
    const PASSWORD_COMPLIANT = ['Zephyrus\Utilities\Validation', 'isPasswordCompliant'];
    const NOT_EMPTY = ['Zephyrus\Utilities\Validation', 'isNotEmpty'];
    const DECIMAL = ['Zephyrus\Utilities\Validation', 'isDecimal'];
    const DECIMAL_SIGNED = ['Zephyrus\Utilities\Validation', 'isSignedDecimal'];
    const INTEGER = ['Zephyrus\Utilities\Validation', 'isInteger'];
    const INTEGER_SIGNED = ['Zephyrus\Utilities\Validation', 'isSignedInteger'];
    const EMAIL = ['Zephyrus\Utilities\Validation', 'isEmail'];
    const DATE_ISO = ['Zephyrus\Utilities\Validation', 'isDate'];
    const TIME_12HOURS = ['Zephyrus\Utilities\Validation', 'isTime12Hours'];
    const TIME_24HOURS = ['Zephyrus\Utilities\Validation', 'isTime24Hours'];
    const DATE_TIME_12HOURS = ['Zephyrus\Utilities\Validation', 'isDateTime12Hours'];
    const DATE_TIME_24HOURS = ['Zephyrus\Utilities\Validation', 'isDateTime24Hours'];
    const DATE_BEFORE = ['Zephyrus\Utilities\Validation', 'isDateBefore'];
    const DATE_AFTER = ['Zephyrus\Utilities\Validation', 'isDateAfter'];
    const DATE_BETWEEN = ['Zephyrus\Utilities\Validation', 'isDateBetween'];
    const ALPHA = ['Zephyrus\Utilities\Validation', 'isAlpha'];
    const NAME = ['Zephyrus\Utilities\Validation', 'isName'];
    const JSON = ['Zephyrus\Utilities\Validation', 'isJson'];
    const XML = ['Zephyrus\Utilities\Validation', 'isXml'];
    const MIN_LENGTH = ['Zephyrus\Utilities\Validation', 'isMaxLength'];
    const MAX_LENGTH = ['Zephyrus\Utilities\Validation', 'isMinLength'];
    const VARIABLE = ['Zephyrus\Utilities\Validation', 'isVariable'];
    const ALPHANUMERIC = ['Zephyrus\Utilities\Validation', 'isAlphanumeric'];
    const URL = ['Zephyrus\Utilities\Validation', 'isUrl'];
    const URL_LIVE = ['Zephyrus\Utilities\Validation', 'isLiveUrl'];
    const URL_STRICT = ['Zephyrus\Utilities\Validation', 'isStrictUrl'];
    const URL_YOUTUBE = ['Zephyrus\Utilities\Validation', 'isYoutubeUrl'];
    const PHONE = ['Zephyrus\Utilities\Validation', 'isPhone'];
    const ZIP_CODE = ['Zephyrus\Utilities\Validation', 'isZipCode'];
    const POSTAL_CODE = ['Zephyrus\Utilities\Validation', 'isPostalCode'];
    const BOOLEAN = ['Zephyrus\Utilities\Validation', 'isBoolean'];
    const IN_RANGE = ['Zephyrus\Utilities\Validation', 'isInRange'];
    const REGEX = ['Zephyrus\Utilities\Validation', 'isRegex'];
    const UPLOAD = ['Zephyrus\Utilities\Validation', 'isUpload'];
    const IMAGE = ['Zephyrus\Utilities\Validation', 'isImageAuthentic'];
    const IP_V4 = ['Zephyrus\Utilities\Validation', 'isIPv4'];
    const IP_V6 = ['Zephyrus\Utilities\Validation', 'isIPv6'];
    const IP_ADDRESS = ['Zephyrus\Utilities\Validation', 'isIpAddress'];
}
