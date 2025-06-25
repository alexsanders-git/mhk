<?php

function as_dump($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**
 * Replaces placeholders in a message with corresponding values from an associative array.
 *
 * This function searches for placeholders in the format {{ key }} in the $message string
 * and replaces them with the values provided in the $placeholders array.
 *
 * @param string $message The string in which placeholders need to be replaced.
 * @param array $placeholders Associative array where keys are placeholder names (without curly braces)
 *                            and values are the data to be inserted.
 *
 * @return string Returns the string with replaced placeholders.
 */
function as_message_templates($message, $placeholders)
{
    $replacements = [];

    foreach ($placeholders as $key => $value) {
        $placeholder = '{{ '.$key.' }}';
        $replacements[$placeholder] = $value ?? '';
    }

    return str_replace(array_keys($replacements), array_values($replacements), $message);
}