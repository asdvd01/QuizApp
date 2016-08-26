package com.nitr.quizapp20;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
public class mainmenu extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mainmenu);
    }
    public void onClickTakeQuiz(View v)
    {
        Settings.prefs = getApplicationContext().getSharedPreferences("serverAddress", Context.MODE_PRIVATE);
        if(!Settings.prefs.getString("ip","null").equals("null"))
            Settings.sa=  Settings.prefs.getString("ip", "null");
        Intent i = new Intent(getBaseContext(),Details.class);
        startActivity(i);

    }
    public void onClickSettings(View v)
    {
        Intent i = new Intent(getBaseContext(),Settings.class);
        startActivity(i);
    }
}
