<?php
namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'media'   => 'nullable|file|mimes:jpg,jpeg,png,mp4,webm|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Comment content is required.',
            'content.string'   => 'Comment content must be a valid string.',
            'media.file'       => 'Uploaded media must be a valid file.',
            'media.mimes'      => 'Media must be a file of type: jpg, jpeg, png, mp4, or webm.',
            'media.max'        => 'Media must not exceed 5MB in size.',
        ];
    }

}
