<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'L\':attribute doit être accepté.',
    'active_url' => 'L\':attribute n\'est pas une URL valide.',
    'after' => 'L\':attribute doit être une date posterieur au :date.',
    'after_or_equal' => 'L\':attribute doit être une date postérieur ou égal à :date.',
    'alpha' => 'L\':attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'L\':attribute ne peut contenir que des lettres, chiffres et des tirets.',
    'alpha_num' => 'L\':attribute  ne peut contenir que des lettres et des chiffres.',
    'array' => 'L\':attribute doit être un tableau.',
    'before' => 'L\':attribute doit être une date antétieur au :date.',
    'before_or_equal' => 'L\':attribute doit être une date antétieur ou egal à :date.',
    'between' => [
        'numeric' => 'L\':attribute doit être entre :min et :max.',
        'file' => 'L\':attribute doit être entre :min et :max kilobytes.',
        'string' => 'L\':attribute doit être entre :min et :max caractères.',
        'array' => 'L\':attribute must have between :min et :max éléments.',
    ],
    'boolean' => 'L\':attribute field must be true or false.',
    'confirmed' => 'L\':attribute confirmation does not match.',
    'date' => 'L\':attribute is not a valid date.',
    'date_equals' => 'L\':attribute must be a date equal to :date.',
    'date_format' => 'L\':attribute does not match the format :format.',
    'different' => 'L\':attribute et :other must be different.',
    'digits' => 'L\':attribute must be :digits digits.',
    'digits_between' => 'L\':attribute doit être entre :min et :max digits.',
    'dimensions' => 'L\':attribute has invalid image dimensions.',
    'distinct' => 'L\':attribute field has a duplicate value.',
    'email' => 'L\'attribute: doit être une adresse e-mail valide.',
    'ends_with' => 'L\':attribute must end with one of L\'following: :values.',
    'exists' => ':attribute selectioné is invalid.',
    'file' => 'L\':attribute must be a file.',
    'filled' => 'L\':attribute field must have a value.',
    'gt' => [
        'numeric' => 'L\':attribute must be greater than :value.',
        'file' => 'L\':attribute must be greater than :value kilobytes.',
        'string' => 'L\':attribute must be greater than :value caractères.',
        'array' => 'L\':attribute must have more than :value éléments.',
    ],
    'gte' => [
        'numeric' => 'L\':attribute must be greater than or equal :value.',
        'file' => 'L\':attribute must be greater than or equal :value kilobytes.',
        'string' => 'L\':attribute must be greater than or equal :value caractères.',
        'array' => 'L\':attribute must have :value éléments or more.',
    ],
    'image' => 'L\'attribute : doit être une image.',
    'in' => ':attribute selectioné is invalid.',
    'in_array' => 'L\':attribute field does not exist in :other.',
    'integer' => 'L\':attribute must be an integer.',
    'ip' => 'L\':attribute doit être une adresse IP valide.',
    'ipv4' => 'L\':attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'L\':attribute doit être une adresse IPv6 valide.',
    'json' => 'L\':attribute doit être une chaine de caractère JSON valide.',
    'lt' => [
        'numeric' => 'L\':attribute doit être inférieur à :value.',
        'file' => 'L\':attribute doit être inférieur à :value kilobytes.',
        'string' => 'L\':attribute doit être inférieur à :value caractères.',
        'array' => 'L\':attribute must have less than :value éléments.',
    ],
    'lte' => [
        'numeric' => 'L\':attribute doit être inférieur à or equal :value.',
        'file' => 'L\':attribute doit être inférieur à or equal :value kilobytes.',
        'string' => 'L\':attribute doit être inférieur à or equal :value caractères.',
        'array' => 'L\':attribute doit être superieur à :value éléments.',
    ],
    'max' => [
        'numeric' => 'L\':attribute ne peut être supérieur à :max.',
        'file' => 'L\':attribute ne peut être supérieur à :max kilobytes.',
        'string' => 'L\':attribute ne peut être supérieur à :max characters.',
        'array' => 'L\':attribute ne peut pas avoir plus de :max éléments.',
    ],
    'mimes' => 'L\':attribute doit être un fichier de type: :values.',
    'mimetypes' => 'L\':attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'L\':attribute doit être au moins :min.',
        'file' => 'L\':attribute doit être au moins :min kilobytes.',
        'string' => 'L\':attribute doit être au moins :min characters.',
        'array' => 'L\':attribute doit avoir au moins :min éléments.',
    ],
    'multiple_of' => 'L\':attribute doit être un multiple de :value',
    'not_in' => ':attribute selectioné est invalide.',
    'not_regex' => 'Le format de :attribute est invalide.',
    'numeric' => 'L\':attribute doit être un nombre.',
    'password' => 'Le mot de passe est invalide.',
    'present' => 'L\':attribute field must be present.',
    'regex' => 'L\':attribute format is invalid.',
    'required' => 'L\':attribute field is required.',
    'required_if' => 'L\':attribute field is required when :other is :value.',
    'required_unless' => 'L\':attribute field is required unless :other is in :values.',
    'required_with' => 'L\':attribute field is required when :values is present.',
    'required_with_all' => 'L\':attribute field is required when :values are present.',
    'required_without' => 'L\':attribute field is required when :values is not present.',
    'required_without_all' => 'L\':attribute field is required when none of :values are present.',
    'same' => 'L\':attribute et :other must match.',
    'size' => [
        'numeric' => 'L\':attribute must be :size.',
        'file' => 'L\':attribute must be :size kilobytes.',
        'string' => 'L\':attribute must be :size characters.',
        'array' => 'L\':attribute must contain :size éléments.',
    ],
    'starts_with' => 'L\':attribute must start with one of the following: :values.',
    'string' => 'L\':attribute must be a string.',
    'timezone' => 'L\':attribute doit être une zone valide.',
    'unique' => 'L\':attribute has already been taken.',
    'uploaded' => 'L\':attribute failed to upload.',
    'url' => 'L\':attribute format is invalid.',
    'uuid' => 'L\':attribute doit être une UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
