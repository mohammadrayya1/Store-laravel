<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordFilter implements Rule
{
    protected $word;
    protected $invalid;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($word1)
    {
        $this->word=$word1;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->word as $word) {
            if (stripos($value, $word) !== false){
                $this->invalid=$word;
                return false;
            }
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return 'please do not use the word '.$this->invalid;
    }


}
