class AllertLabel{
	
	label(options){
		
		var icon;
		var color;
		
		if(options.type=='success'){
			icon = 'fas fa-check-circle';
			color = '#71b200';
		} else if (options.type =='error'){
			icon = 'fas fa-exclamation-triangle';
			color = '#c34d4d';
		}

		let label = `<div class="alert-label-message" style="background: ${color}">
				<div class="alert-label-message-icon">
					<span><i class="${icon} fa-fw" aria-hidden="true"></i></span>
				</div>
				<div class="alert-label-message-text">
					<p>${options.message}</p>
				</div>
			</div>`;
		
		$('.alert-label').append(label);
		
	};

};

const al = new AllertLabel();












