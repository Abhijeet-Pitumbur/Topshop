<?php
// PHPMailer - https://github.com/PHPMailer/PHPMailer
namespace PHPMailer\PHPMailer;
use League\OAuth2\Client\Grant\RefreshToken;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
class OAuth
{
	protected $provider;
	protected $oauthToken;
	protected $oauthUserEmail = '';
	protected $oauthClientSecret = '';
	protected $oauthClientId = '';
	protected $oauthRefreshToken = '';
	public function __construct($options)
	{
		$this->provider = $options['provider'];
		$this->oauthUserEmail = $options['userName'];
		$this->oauthClientSecret = $options['clientSecret'];
		$this->oauthClientId = $options['clientId'];
		$this->oauthRefreshToken = $options['refreshToken'];
	}
	protected function getGrant()
	{
		return new RefreshToken();
	}
	protected function getToken()
	{
		return $this->provider->getAccessToken(
			$this->getGrant(),
			['refresh_token' => $this->oauthRefreshToken]
		);
	}
	public function getOauth64()
	{
		if (null === $this->oauthToken || $this->oauthToken->hasExpired()) {
			$this->oauthToken = $this->getToken();
		}
		return base64_encode(
			'user='
				. $this->oauthUserEmail
				. '\001auth=Bearer '
				. $this->oauthToken
				. '\001\001'
		);
	}
}
?>