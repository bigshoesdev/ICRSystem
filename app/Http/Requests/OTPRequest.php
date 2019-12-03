<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Google2FA;
use Illuminate\Validation\Factory as ValidatonFactory;
use Cache;

class OTPRequest extends FormRequest
{
    public function __construct(ValidatonFactory $factory)
    {
        $factory->extend(
            'valid_token',
            function ($attribute, $value, $parameters, $validator) {
                $secret = $this->user->google2fa_secret;
                return Google2FA::verifyKey($secret, $value);
            },
            'Invalid Google Authenticator Code'
        );

        $factory->extend(
            'used_token',
            function ($attribute, $value, $parameters, $validator) {
                $key = $this->user->id . ':' . $value;

                return !Cache::has($key);
            },
            'Cannot reuse code'
        );
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $this->user = Auth::user();
        } catch (Exception $exc) {
            return false;
        }
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'totp' => 'bail|required|digits:6|valid_token|used_token',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [];
            }
            default:
                break;
        }
    }

    public function attributes()
    {
        return [
            'totp' => 'Google Authentication Code',
        ];
    }
}