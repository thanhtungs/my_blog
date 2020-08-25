<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14-08-2020
 * Time: 4:25 PM
 */

namespace TungTT\Users\Http\Services;


use Illuminate\Support\Facades\Hash;
use TungTT\FileSystems\Components\FileSystem;
use TungTT\Users\Models\User;

class UserService
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var FileSystem
     */
    private $fileSystem;

    /**
     * UserService constructor.
     * @param User $user
     * @param FileSystem $fileSystem
     */
    public function __construct(User $user, FileSystem $fileSystem)
    {

        $this->user = $user;
        $this->fileSystem = $fileSystem;
    }

    public function create(array $input)
    {
        if (!empty($data)) return false;

        $input = $this->data($input);

        $user = $this->user->fill($input);

        $user->save();

        return $user;

    }

    public function data($input)
    {
        if (!empty($input['image'])) {
            $input['avatar'] = $this->fileSystem->uploadUserImage($input['image']);
        }

        $input['password'] = Hash::make($input['password']);

        $input['active'] = User::ACTIVE;

        return $input;

    }

    public function checkUnique($data)
    {
        if (empty($data)) return 'false';

        if (isset($data['email'])) {
            $user = $this->user->where('email', $data['email'])->first();
        }

        if (isset($data['phone'])) {
            $user = $this->user->where('phone', $data['phone'])->first();
        }

        if (isset($user)) {
            return $user->id == $data['id'] ? 'true' : 'false';
        }

        return 'true';
    }
}