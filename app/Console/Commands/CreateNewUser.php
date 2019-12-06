<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin';
    private $user;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }


    private function getDetails() : array
    {
        $isNotUniqueUser = true;
        $details=array();
        while($isNotUniqueUser) {
            $details['username'] = $this->ask('Username');
            if(!is_null(User::where('username',$details['username'])->first())){
                $this->error('This user is exists, try other username!');
            }
            else{
                $isNotUniqueUser=false;
            }
        }
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');
        while (! $this->isValidPassword($details['password'], $details['confirm_password'])) {
            if (! $this->isRequiredLength($details['password'])) {
                $this->error('Password must be more that six characters');
            }
            if (! $this->isMatch($details['password'], $details['confirm_password'])) {
                $this->error('Password and Confirm password do not match');
            }
            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }
        $details['password'] = Hash::make($details['password'] );
        $details['confirm_password'] = Hash::make($details['confirm_password'] );
        return $details;
    }
    private function isValidPassword(string $password, string $confirmPassword) : bool
    {
        return $this->isRequiredLength($password) &&
            $this->isMatch($password, $confirmPassword);
    }
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 6;
    }
    private function display(User $admin) : void
    {
        $headers = ['Name'];
        $fields = [
            'Name' => $admin->username,
        ];
        $this->info('Admin created');
        $this->table($headers, [$fields]);
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();
        $admin = $this->user->createAdmin($details);
        $this->display($admin);
    }
}
