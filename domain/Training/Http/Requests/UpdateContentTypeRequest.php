<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\ContentTypeDTO;
use Domain\Training\Models\ContentType;
use Domain\Training\Services\ContentTypeService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class UpdateContentTypeRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\ContentTypeService
     */
    protected $contentTypeService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\ContentTypeService $contentTypeService
     */
    public function __construct(ContentTypeService $contentTypeService)
    {
        parent::__construct();
        $this ->contentTypeService = $contentTypeService;
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
        $key = resolve_key_to_use(ContentType::class, $this ->route('id'));

        return [
            'name'          => 'required|string|max:255',
            'slug'          => [
                'string', 'max:255', Rule::unique('content_types', 'slug') ->ignore($this ->route('id'), $key)
            ],
            'description'   => 'string|nullable',
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
     * @return \Domain\Training\DataTransferObjects\LevelDTO
     */
    public function toDTO(): ContentTypeDTO
    {
        return new ContentTypeDTO([
            'name'          => $this ->name,
            'slug'          => $this ->slug,
            'description'   => $this ->description,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->contentTypeService ->update($this ->toDTO(), $this ->route('id'));
    }
}
