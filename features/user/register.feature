Feature: Register
  In order to gain access to the add bird area
  As an anonymous user
  I need to be able to register

  @fixtures
  Scenario: Register for the first time
    Given I am on the homepage
    Then I follow "Inscription"
    Then I should be on "/inscription/"
    And I fill in "fos_user_registration_form[username]" with "quentin"
    And I fill in "fos_user_registration_form[email]" with "quentin@gmail.com"
    And I fill in "fos_user_registration_form[plainPassword][first]" with "qwerty"
    And I fill in "fos_user_registration_form[plainPassword][second]" with "qwerty"
    And I press "Je m'inscris"
    Then I should be on "/inscription/confirmation"
    And I follow "Accueil"
    Then I should be on the homepage

  Scenario: password Forgotten
    Given I am on the homepage
    And I click on "#logoNavbar"
    Then I follow "J'ai oublié mon mot de passe"
    Then I should be on "/reinitialiser/requete"
    And fill in "username" with "arthur"
    And I press "Mot de passe oublié"
    Then I should see "Un e-mail a été envoyé."