<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\LanguageDTO;
use Domain\Training\Models\Language;
use Domain\Training\Services\LanguageService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class UpdateLanguageRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\LanguageService
     */
    protected $languageService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\LanguageService $languageService
     */
    public function __construct(LanguageService $languageService)
    {
        parent::__construct();
        $this ->languageService = $languageService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $key = resolve_key_to_use(Language::class, $this ->route('id'));

        return [
            'name'              => 'required|string|max:255',
            'slug'              => [
                'string', 'max:255', Rule::unique('languages', 'slug') ->ignore($this ->route('id'), $key)
            ],
            'short_description' => 'string|nullable|max:255',
            'description'       => 'string|nullable',
            'image'             => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    /**
     * Get sanitizers defined for form input
     *
     * @return array
     */
    public function sanitizers(): array
    {
        return [
            'name' => [
                Capitalize::class,
            ]
        ];
    }

    /**
     * Build and return a DTO
     *
     * @return \Domain\Training\DataTransferObjects\LanguageDTO
     */
    public function toDTO(): LanguageDTO
    {
        return new LanguageDTO([
            'name'              => $this ->name,
            'slug'              => $this ->slug,
            'short_description' => $this ->short_description,
            'description'       => $this ->description,
            'image'             => $this ->image,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->languageService ->update($this ->toDTO(), $this ->route('id'));
    }
}
