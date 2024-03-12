<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
      'name' => [
        'required',
        'regex:/^[\p{L}\s]{1,32}$/u',
      ],
      'telephone' => [
        'required',
        'regex:/^(84|0[3|5|7|8|9])+([0-9]{8})\b/',
      ],
      'email' => [
        'required',
        'regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
      ],
      'password' => [
        'required',
        'regex:/^.*(?=.{4,20})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
      ]
    ];
  }
  public function messages(): array
  {
    return [
      'name.required' => 'Vui lòng nhập tên',
      'name.regex' => 'Tên phải từ 1 đến 32 kí tự!',
      'password.required' => 'Vui lòng nhập mật khẩu',
      'password.regex' => 'Mật khẩu phải từ 4 đến 20 kí tự!',
      'email.required' => 'Vui lòng nhập email',
      'email.regex' => 'Không đúng định dạng email',
      'telephone.required' => 'Vui lòng nhập số điện thoại',
      'telephone.regex' => 'Số điện thoại không hợp lệ',
    ];
  }
}
