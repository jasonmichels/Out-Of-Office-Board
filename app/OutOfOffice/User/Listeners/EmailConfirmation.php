<?php namespace OutOfOffice\User\Listeners;

use OutOfOffice\User\Contracts\UserWasCreatedEvent;
use Laracasts\Commander\Events\EventListener;
use Illuminate\Support\Facades\Mail;

/**
 * Send email confirmation when user is created
 *
 * Class EmailConfirmation
 *
 * @package OutOfOffice\User\Listeners
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class EmailConfirmation extends EventListener
{
    /**
     * @param UserWasCreatedEvent $userWasCreated
     */
    public function whenUserWasCreatedEvent(UserWasCreatedEvent $userWasCreated)
    {
//        Mail::send('user::emails.confirmation', $confirmation_code, function($message) {
//            $message->to(Input::get('email'), Input::get('username'))
//                ->subject('Verify your email address');
//        });
//
//
//
//
//        Mail::queue('user::emails.signup', array('user' => $userArray), function($message) use ($userArray)
//        {
//            $message->to($userArray['email'], $userArray['name'])->subject('Welcome To BikeFree.TV!')->bcc('jason@bikefree.tv');
//        });
//
//
//        Mail::send('emails.welcome', array('key' => 'value'), function($message)
//        {
//            $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
//        });
        // @TODO If you want to send out notifications, do something here.
        dd('The user was created, now lets send an email confirmation');
    }
}
