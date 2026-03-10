<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make(
            $input,
            [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'tel' => ['required', 'string', 'max:20'],
            'password' => $this->passwordRules(),
            ],
            [
                'name.required' => '名前を入力してください',
                'name.string' => '名前を文字列で入力してください',
                'name.max' => '名前を255文字以内で入力してください',
                'age.required' => '年齢を入力してください',
                'age.string' => '年齢を文字列で入力してください',
                'age.max' => '年齢を255文字以内で入力してください',
                'email.required' => 'メールアドレスを入力してください',
                'email.email' => 'メールアドレスの形式が正しくありません',
                'email.max' => 'メールアドレスを255文字以内で入力してください',
                'tel.required' => '電話番号を入力してください',
                'tel.string' => '電話番号を文字列で入力してください',
                'tel.max' => '電話番号を20文字以内で入力してください',
                'password.required' => 'パスワードを入力してください',
                'password.confirmed' => 'パスワードが一致しません',
            ])->validate();

        return User::create([
            'name' => $input['name'],
            'age' => $input['age'],
            'email' => $input['email'],
            'tel' => $input['tel'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
