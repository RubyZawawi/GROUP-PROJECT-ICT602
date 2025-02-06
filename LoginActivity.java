package com.example.healthlocator;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

public class LoginActivity extends AppCompatActivity {

    private EditText usernameEditText, passwordEditText;
    private Button loginButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // Initialize UI components
        usernameEditText = findViewById(R.id.user_name);
        passwordEditText = findViewById(R.id.password);
        loginButton = findViewById(R.id.login_button);

        // Set up the Login button click listener
        loginButton.setOnClickListener(v -> {
            String username = usernameEditText.getText().toString().trim();
            String password = passwordEditText.getText().toString().trim();

            // Validate input
            if (TextUtils.isEmpty(username) || TextUtils.isEmpty(password)) {
                Toast.makeText(LoginActivity.this, "Please enter both username and password.", Toast.LENGTH_SHORT).show();
            } else {
                // Retrieve the stored username and password from SharedPreferences
                SharedPreferences sharedPreferences = getSharedPreferences("UserPrefs", MODE_PRIVATE);
                String savedUsername = sharedPreferences.getString("username", "");
                String savedPassword = sharedPreferences.getString("password", "");

                // Debug logs: Check what is retrieved from SharedPreferences
                Log.d("LoginActivity", "Saved Username: " + savedUsername);
                Log.d("LoginActivity", "Saved Password: " + savedPassword);

                // Validate if the entered credentials match the stored ones
                if (username.equals(savedUsername) && password.equals(savedPassword)) {
                    // If valid, store the username in SharedPreferences for HomeActivity
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putString("loggedInUsername", username); // Store the logged-in username
                    editor.apply();

                    // Proceed to HomeActivity
                    Intent intent = new Intent(LoginActivity.this, HomeActivity.class);
                    startActivity(intent);
                    finish();  // Close the LoginActivity
                } else {
                    // If invalid, show a toast message
                    Toast.makeText(LoginActivity.this, "Invalid username or password.", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
}
