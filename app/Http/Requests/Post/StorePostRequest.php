<?php
namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'   => 'required|string|min:1|max:255',
            'content' => 'nullable|string',
            'media'   => 'nullable|file|mimes:jpg,jpeg,png,mp4,webm|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'title.string'   => 'Title must be a valid string.',
            'title.min'      => 'Title must contain at least 1 character.',
            'title.max'      => 'Title may not be greater than 255 characters.',
            'content.string' => 'Content must be a valid string.',
            'media.file'     => 'Uploaded media must be a file.',
            'media.mimes'    => 'Media must be a file of type: jpg, jpeg, png, mp4, or webm.',
            'media.max'      => 'Media size must not exceed 5MB.',
        ];
    }

}
